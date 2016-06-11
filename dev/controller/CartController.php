<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'ProductDAO.php';


	class CartController extends Controller {
		protected $productDAO;

		function __construct() {

			$this->productDAO = new ProductDAO();

		}


			public function add() {

		if(!empty($_POST['productId'])){

			$_SESSION["shoppingcart"][] = $_POST['productId'];

			$this->redirect("index.php?page=cart");

		} else {
			$this->redirect("index.php?page=cart");
		}

	}

	public function index(){

		if(isset($_SESSION['shoppingcart'])){

			$shoppingcart = $_SESSION["shoppingcart"];

			foreach($shoppingcart as $product){
				$winkelwagen[] = $this->productDAO->selectById($product);
				$subtotal = 0;
				
			}
			$this->set('shoppingcart',$winkelwagen);
			$subtotal += $product['price'];

		}
		$this->set('subtotal', $subtotal);

	}

	


			
				//$subtotal = 0;
				
			
		

		
		//$subtotal += $product['price'];
	
	//$this->set('subtotal', $subtotal);



			// if(isset($_SESSION['winkelkar'])){
			// $winkelkar = $_SESSION["winkelkar"];

			// foreach($winkelkar as $product){
			// 	$winkelwagen[] = $this->productDAO->selectById($product);


			// //$subtotal = 0;
			// }
			// $this->set('winkelkar',$winkelwagen);
			// //$subtotal += $product['price'];


		

		



			//$productId = ["1","2","3","4","5","6","7","8","9","10"];
			//$amount = [0];

			//$winkelwagen = [$productId,$amount];
			// $winkelwagen = [0];
			// 

			//$winkelwagen = array(
				//"productId" => $_POST['productId'],
				//"amount" => $_POST['product_'.$id.'_amount']
				//);

			// Shoppingcart
			// [1, 2, 3, 3]

			// [
			//	1 => 1,
			//	2 => 1,
			//	3 => 2,
			//	4 => 1,
			// ]

			// $subtotal = 0;

			// if(isset($_SESSION['shoppingcart'])){

			// 	foreach( $_SESSION['shoppingcart'] as $productId){
			// 	//foreach( $_SESSION['shoppingcart'] as $productId => $amount){

			// 		$product = $this->productDAO->selectById($productId);

			// 		$winkelwagen[] = $product;

			// 		//$subtotal = '';
					
					
				
					
								

			// 	}

			// 	$this->set('shoppingcart',$winkelwagen);

			// }

			//$this->set('subtotal', $subtotal);

		
	

		
	
	
	// if(!empty($_POST['productId'])){

		// 	$_SESSION["winkelkar"][] = $_POST['productId'];

		// 	$this->redirect("index.php?page=cart");

		// } else {
		// 	$this->redirect("index.php?page=cart");
		// }
	



	public function flush(){
		session_destroy();
		$this->redirect('index.php?page=cart');
	}


}
?>