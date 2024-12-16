<?php

require_once __DIR__ . '/../controllers/MainController.php';
require_once __DIR__ . '/../controllers/AccountController.php';
require_once __DIR__ . '/../controllers/CatalogController.php';
require_once __DIR__ . '/../controllers/CartController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public) utiliser avec Xampp
//$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$basePath = '';
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/about', 'MainController#about', 'about');

$router->map('POST', '/account/login', 'AccountController#login', 'login');
$router->map('GET', '/account/logout', 'AccountController#logout', 'logout');
$router->map('POST', '/account/register', 'AccountController#register', 'register');
$router->map('GET', '/login', 'AccountController#loginPage', 'loginPage');
$router->map('GET', '/register', 'AccountController#registerPage', 'registerPage');

$router->map('GET', '/catalog', 'CatalogController#catalog', 'catalog');
$router->map('GET', '/product', 'CatalogController#product', 'product');

$router->map('GET', '/cart', 'CartController#cart', 'cart');
$router->map('GET', '/cart/addToCart', 'CartController#addToCart', 'addToCart');
$router->map('GET', '/cart/updateQuantity', 'CartController#updateQuantity', 'updateQuantity');
$router->map('GET', '/cart/removeFromCart', 'CartController#removeFromCart', 'removeFromCart');
$router->map('GET', '/cart/empty', 'CartController#empty', 'empty');
$router->map('POST', '/cart/validate', 'CartController#validate', 'validate');

// Retourne l'objet router
return $router;
