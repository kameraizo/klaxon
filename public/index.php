<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';

use Buki\Router\Router;

$router = new Router([
    'base_folder' => '/klaxon/public',
    'paths' => [
        'controllers' => '../app/controllers',
    ]
]);

$router->get('/', 'HomeController@index');

$router->run();