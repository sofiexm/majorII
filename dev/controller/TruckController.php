<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'TruckDAO.php';
require_once WWW_ROOT . 'dao' . DS . 'ProductDAO.php';


class TruckController extends Controller {
		protected $truckDAO;
		protected $productDAO;

		function __construct() {

			$this->truckDAO = new TruckDAO();
			$this->productDAO = new ProductDAO();

		}
	public function index() {
			$trucks = $this->truckDAO->selectAll();
			$products = $this->productDAO->selectAll();
			

			// $this->set('trucks', $trucks);
			$this->set('products', $products);

		//$trucks = $this->truckDAO->allesOphalen();	

		$this->set('trucks', $trucks);

		}
	}
?>
