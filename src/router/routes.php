<?php

require_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public) utiliser avec Xampp
//$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$basePath = '';
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/login', 'MainController#login', 'login');
$router->map('GET', '/logout', 'MainController#logout', 'logout');
$router->map('GET', '/register', 'MainController#register', 'register');
$router->map('GET', '/catalog', 'MainController#catalog', 'catalog');
$router->map('GET', '/product', 'MainController#product', 'product');
$router->map('GET', '/cart', 'MainController#cart', 'cart');
$router->map('GET', '/about', 'MainController#about', 'about');

// Retourne l'objet router
return $router;
