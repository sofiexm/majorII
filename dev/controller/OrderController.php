<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'ProductDAO.php';


	class OrderController extends Controller {
		protected $productDAO;

		function __construct() {

			$this->productDAO = new ProductDAO();

		}

		public function index(){
			if (!empty($_POST['bevestigen'])) {
				$this->pay();
			}

		}

		

  	public function pay(){

  		$data = [
			"first_name" => $_POST["first_name"],
			"last_name" => $_POST["last_name"],
			"address" => $_POST["address"],
			"email" => $_POST["email"],
			"postal_code" => $_POST["postal_code"],
			"city" => $_POST["city"],
		];

		$this->productDAO->insert($data);

  	}

  	//private function handleRegistration(){

		// $data = [
		// 	"first_name" => $_POST["first_name"],
		// 	"last_name" => $_POST["last_name"],
		// 	"email" => $_POST("email"),
		// 	"address" => $_POST["address"],
		// 	"postal_code" => $_POST["postal_code"],
		// 	"city" => $_POST["city"],
		// ];

		// $this->productDAO->insert( $data );

		// 	$_SESSION['shoppingcart'] = "De bestelling is succesvol aangemaakt";
		// 	$this->redirect('index.php');

		// }else {

		// 	$_SESSION['error'] = $this->productDAO->validateRegistrationData($data);
		// 	$this->redirect('index.php?page=order');

		// }

	//}

	}
?>
