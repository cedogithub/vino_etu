<?php

class Bouteille
{    
    /**
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function accueil()
    {
        $bte = new BouteilleModel();
        $data = $bte->getBouteillesCellier();
        include("vues/entete.php");
        include("vues/cellier.php");
        include("vues/pied.php");    
    }
        
    /**
     * Affiche la page d'ajout de bouteille
     *
     * @return void
     */
    public function nouvelleBouteilleCellier()
    {
        $bte = new BouteilleModel();
        $listeBouteille = $bte->getListeBouteille();
        include("vues/entete.php");
        include("vues/ajouter.php");
        include("vues/pied.php");
    }
    
    /**
     * Gère la requête INSERT de bouteille
     *
     * @return void
     */
    public function ajouterBouteilleCellier()
    {
        $bte = new BouteilleModel();
        $cellier = $bte->ajouterBouteilleCellier($_POST);
        header("Location: /accueil");
    }
    
    /**
     * Affiche la page de modification d'une bouteille
     *
     * @param  mixed $id_bouteille id de la bouteille
     * @return void
     */
    public function modificationBouteille($id_bouteille)
    {
        $bte = new BouteilleModel();
        $listeBouteille = $bte->getListeBouteille();

        $data = $bte->getUneBouteilleCellier($id_bouteille);
        // Vérification si id existe
        if ( ! $data) {
            header("Location: /accueil");
        } else {  
            include("vues/entete.php");
            include("vues/modifier.php");
            include("vues/pied.php");
        }
    }
   
}
