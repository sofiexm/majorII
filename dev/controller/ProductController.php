<?php

require_once WWW_ROOT . 'controller' . DS . 'Controller.php';
require_once WWW_ROOT . 'dao' . DS . 'ProductDAO.php';


	class ProductController extends Controller {
		protected $productDAO;

		function __construct() {

			$this->productDAO = new ProductDAO();

		}

		public function index() {
			$products = $this->productDAO->selectAll();


			$this->set('products', $products);
		}

	}
?>