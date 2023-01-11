<?php
require_once('./dataconf.model.php');
require __DIR__ . '/config/config.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Controllers/Bouteille.php';

// Create Router instance
$router = new \Bramus\Router\Router();


$router->get('/', 'Bouteille@accueil');
$router->get('/accueil', 'Bouteille@accueil');
$router->get('/nouvelleBouteilleCellier', 'Bouteille@nouvelleBouteilleCellier');

$router->post('/ajouterBouteilleCellier', 'Bouteille@ajouterBouteilleCellier');



// Run it!
$router->run();



?>
