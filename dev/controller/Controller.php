<?php

class Controller {

	public $route;
	protected $viewVars = array();

	public function filter() {
		$this->protectRoute();
		
		call_user_func(array($this, $this->route['action']));
	}
	public function protectRoute(){

		// For laziness
		if( !isset($this->route["protected"]) ){
			$this->route["protected"] = false;
		}

		// Check if the route is protected and if the user is not logged in
		if( $this->route["protected"] && !$this->isUserLoggedIn() ){
			$this->redirect('index.php?page=login');
		}

	}

	public function isUserLoggedIn(){
		return isset( $_SESSION["user"] );
	}

	public function render() {

		$headers = apache_request_headers();
		if( empty($headers['x-respond-with']) || strtolower($headers['x-respond-with']) != 'json') {

			$this->setSessionMessages();
			$this->createViewVarWithContent();
			$this->renderInLayout();
			$this->unsetSessionMessages();

		}

	}

	public function set($variableName, $value) {
		$this->viewVars[$variableName] = $value;
	}

	private function setSessionMessages() {
		if(!empty($_SESSION['info'])) $this->set('info', $_SESSION['info']);
		if(!empty($_SESSION['error'])) $this->set('error', $_SESSION['error']);
	}

	private function unsetSessionMessages() {
		if(!empty($_SESSION['info'])) unset($_SESSION['info']);
		if(!empty($_SESSION['error'])) unset($_SESSION['error']);
	}

	public function redirect($url) {
		header("Location: {$url}");
		exit();
	}

	private function createViewVarWithContent() {
		extract($this->viewVars, EXTR_OVERWRITE);
		ob_start();
		require WWW_ROOT . 'view' . DS . strtolower($this->route['controller']) . DS . $this->route['action'] . '.php';
		$content = ob_get_clean();
		$this->set('content', $content);
	}

	private function renderInLayout() {

			extract($this->viewVars, EXTR_OVERWRITE);

			$headers = apache_request_headers();

			if(!empty($headers['x-requested-with']) && strtolower($headers['x-requested-with']) == 'ajax') {

        echo $content;

     } else {

        include WWW_ROOT . 'view' . DS . 'layout.php';

     }

	}

}
