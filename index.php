<?php
session_start();
require_once __DIR__. '/dataconf.model.php';
require __DIR__ . '/vendor/autoload.php';
// Create Router instance
$router = new \Bramus\Router\Router();


$router->get('/', 'Utilisateur@accueil');
$router->get('/utilisateur/accueil', 'Utilisateur@accueil');
$router->get('/utilisateur/inscription', 'Utilisateur@inscription');


$router->post('/utilisateur/connection', 'Utilisateur@connection');
$router->get('/utilisateur/deconnexion', 'Utilisateur@deconnexion');
$router->post('/utilisateur/creation', 'Utilisateur@creation'); /* a faire par cedric */


/* route de sécurité que je vais ajouté pour voir si user est authentifié */

$router->get('/bouteille/accueil', 'Bouteille@accueil');
$router->get('/bouteille/nouveau', 'Bouteille@nouvelleBouteilleCellier');
$router->post('/bouteille/ajouter', 'Bouteille@ajouterBouteilleCellier');
$router->get('/bouteille/modifier/{id}', 'Bouteille@modificationBouteille');
$router->post('/bouteille/quantite/boire/', 'Bouteille@boireQuantiteBouteille');
$router->post('/bouteille/quantite/ajouter/', 'Bouteille@ajouterQuantiteBouteille');

$router->run();


// SAQ
/* for ($i=1; $i < 10 ; $i++) { 
}
(new BouteilleSAQModel())->fetch_bottle_from_SAQ($i);
 */
/* (new BouteilleSAQModel())->fetch_bottle_from_SAQ("1"); */

   