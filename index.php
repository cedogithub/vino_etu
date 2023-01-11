<?php

require_once('./dataconf.model.php');
require __DIR__ . '/config/config.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Controller/Controller.php';

// Create Router instance
$router = new \Bramus\Router\Router();


$router->get('/', 'Controller@accueil');
$router->get('/accueil', 'Controller@accueil');
$router->get('/nouvelleBouteilleCellier', 'Controller@nouvelleBouteilleCellier');

$router->post('/ajouterBouteilleCellier', 'Controller@ajouterBouteilleCellier');




// Run it!
$router->run();



?>
