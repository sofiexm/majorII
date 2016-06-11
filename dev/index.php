<?php 
	session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', __DIR__ . DS);

$routes = array(
  'home' => array(
    'controller' => 'Product',
    'action' => 'index'
  ),
  'truck' => array(
  	'controller' => 'Truck',
  	'action' => 'index'
  	),
  'add-to-cart' => array(
        'controller' => 'Cart',
        'action' => 'add'
    ),
  'cart' => array(
        'controller' => 'Cart',
        'action' => 'index'
    ),
  'empty-cart' => array(
    'controller' => 'Cart',
    'action' => 'flush'
  ),
  'order' => array(
    'controller' => 'Order',
    'action' => 'index'
  ),
   'pay' => array(
    'controller' => 'Order',
    'action' => 'pay'
  ),
    'map' => array(
    'controller' => 'Order',
    'action' => 'index'
    )



 
 );

if(empty($_GET['page'])) {
    $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
    header('Location: index.php');
    exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once WWW_ROOT . 'controller' . DS . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();