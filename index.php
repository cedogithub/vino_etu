<?php
require_once __DIR__. '/dataconf.model.php';
require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();


$router->get('/', 'Bouteille@accueil');
$router->get('/accueil', 'Bouteille@accueil');
$router->get('/nouvelleBouteilleCellier', 'Bouteille@nouvelleBouteilleCellier');

$router->post('/ajouterBouteilleCellier', 'Bouteille@ajouterBouteilleCellier');
$router->get('/modificationBouteille/{id}', 'Bouteille@modificationBouteille');


$router->post('/boireQuantiteBouteille', 'Bouteille@boireQuantiteBouteille');
$router->post('/ajouterQuantiteBouteille', 'Bouteille@ajouterQuantiteBouteille');



// Run it!
$router->run();

// (new BouteilleSAQ())->fetch_bottle_from_SAQ('1');

   