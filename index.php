<?php

require_once __DIR__. '/dataconf.model.php';
require __DIR__ . '/config/config.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Controllers/Bouteille.php';

// Create Router instance
$router = new \Bramus\Router\Router();


$router->get('/', 'Bouteille@accueil');
$router->get('/accueil', 'Bouteille@accueil');
$router->get('/nouvelleBouteilleCellier', 'Bouteille@nouvelleBouteilleCellier');

$router->post('/ajouterBouteilleCellier', 'Bouteille@ajouterBouteilleCellier');
$router->get('/modificationCellier/{id}', 'Bouteille@modificationCellier');




// Run it!
$router->run();



?>
