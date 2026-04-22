<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/TrajetController.php';

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
$router->get('/trajets/create', 'TrajetController@create');

// Traite le formulaire de connexion (POST car on envoie des données)
$router->post('/login', 'AuthController@login');
$router->post('/trajets/store', 'TrajetController@store');

//modification trajet
$router->get('/trajets/edit/:id', 'TrajetController@edit');
$router->post('/trajets/update/:id', 'TrajetController@update');

//suppression trajet
$router->get('/trajets/delete/:id', 'TrajetController@delete');

// Déconnexion
$router->get('/logout', 'AuthController@logout');

$router->run();