<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

use Buki\Router\Router;

$router = new Router([
    'base_folder' => '/klaxon/public',
    'paths' => [
        'controllers' => '../app/controllers',
    ]
]);

// Page d'accueil
$router->get('/', 'HomeController@index');

// Affiche le formulaire de connexion
$router->get('/login', 'AuthController@loginForm');

// Traite le formulaire de connexion (POST car on envoie des données)
$router->post('/login', 'AuthController@login');

// Déconnexion
$router->get('/logout', 'AuthController@logout');

$router->run();