<?php
// require and load autoload psr-4
require_once('vendor/autoload.php');

// load Router
use Bramus\Router\Router;

// require and load dotenv file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Create Router instance
$router = new Router();

// load views pages
$router->get('/login', '\Controllers\Admin@loginView');
$router->get('/register', '\Controllers\Admin@registerView');

// load views authenticated
$router->get('/admin/home', '\Controllers\Admin@adminView');

// consume methods
$router->post('/sign-in', '\Controllers\Admin@signIn');
$router->post('/sign-up', '\Controllers\Admin@signUp');
$router->get('/logout', '\Controllers\Admin@logout');


$router->run();
