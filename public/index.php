<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/TrajetController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

use Buki\Router\Router;

$router = new Router([
    'base_folder' => '/klaxon/public',
    'paths' => [
        'controllers' => '../app/controllers',
    ]
]);

// Page d'accueil
$router->get('/', 'HomeController@index');

// Connexion / Déconnexion
$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

// Trajets
$router->get('/trajets/create', 'TrajetController@create');
$router->post('/trajets/store', 'TrajetController@store');
$router->get('/trajets/edit/:id', 'TrajetController@edit');
$router->post('/trajets/update/:id', 'TrajetController@update');
$router->get('/trajets/delete/:id', 'TrajetController@delete');

// Admin
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/agences', 'AdminController@agences');
$router->post('/admin/agences/store', 'AdminController@agenceStore');
$router->post('/admin/agences/update/:id', 'AdminController@agenceUpdate');
$router->get('/admin/agences/delete/:id', 'AdminController@agenceDelete');
$router->get('/admin/trajets', 'AdminController@trajets');
$router->get('/admin/trajets/delete/:id', 'AdminController@trajetDelete');

$router->run();