<?php
session_start();
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


// SAQ
/* for ($i=1; $i < 10 ; $i++) { 
}
(new BouteilleSAQModel())->fetch_bottle_from_SAQ($i);
 */
/* (new BouteilleSAQModel())->fetch_bottle_from_SAQ("1"); */
   