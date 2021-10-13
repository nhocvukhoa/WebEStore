<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

//TODO: 1. Điều hướng trang Home
$router->add('/BanHang/public/index.php', ['controller' => 'Home', 'action' => 'index']);
$router->add('/BanHang/public/product-list.php', ['controller' => 'Home', 'action' => 'productList']);
$router->add('/BanHang/public/product-detail.php', ['controller' => 'Home', 'action' => 'productListDetail']);
$router->add('/BanHang/public/product-detail.php/{id:\d+}', ['controller' => 'Home', 'action' => 'getIdProduct']);
$router->add('/BanHang/public/cart.php', ['controller' => 'Home', 'action' => 'cart']);
$router->add('/BanHang/public/checkout.php', ['controller' => 'Home', 'action' => 'checkout']);
$router->add('/BanHang/public/register.php', ['controller' => 'Home', 'action' => 'register']);
$router->add('/BanHang/public/check-register.php', ['controller' => 'Home', 'action' => 'checkRegister']);
$router->add('/BanHang/public/login.php', ['controller' => 'Home', 'action' => 'login']);
$router->add('/BanHang/public/check-login.php', ['controller' => 'Home', 'action' => 'checkLogin']);

//TODO: 2. Điều hướng trang Admin
$adminURL = '/BanHang/public/Admin';

$router->add($adminURL . '/index.php', ['controller' => 'Admin', 'action' => 'indexAdmin']);

$router->add($adminURL . '/category.php', ['controller' => 'Admin', 'action' => 'categoryAdmin']);
$router->add($adminURL . '/add-category.php', ['controller' => 'Admin', 'action' => 'addCategoryAdmin']);
$router->add($adminURL . '/delete-category.php/{id:\d+}', ['controller' => 'Admin', 'action' => 'deleteCategoryAdmin']);
$router->add($adminURL . '/update-category.php/{id:\d+}', ['controller' => 'Admin', 'action' => 'updateCategoryAdmin']);

$router->add($adminURL . '/product.php', ['controller' => 'Admin', 'action' => 'productAdmin']);
$router->add($adminURL . '/add-product.php', ['controller' => 'Admin', 'action' => 'addProductAdmin']);
$router->add($adminURL . '/delete-product.php/{id:\d+}', ['controller' => 'Admin', 'action' => 'deleteProductAdmin']);
$router->add($adminURL . '/update-product.php/{id:\d+}', ['controller' => 'Admin', 'action' => 'updateProductAdmin']);

$router->dispatch($_SERVER['REQUEST_URI']);
