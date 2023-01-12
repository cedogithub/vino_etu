<?php

class Bouteille
{
    public function accueil()
    {
        $bte = new BouteilleModel();
        $data = $bte->getListeCellier();
        include("vues/entete.php");
        include("vues/cellier.php");
        include("vues/pied.php");    
    }
    

    public function listeBouteille()
    {
        $bte = new BouteilleModel();
        $cellier = $bte->getListeCellier();

        echo json_encode($cellier);         
    }
    
    public function nouvelleBouteilleCellier()
    {
        $bte = new BouteilleModel();
        $listeBouteille = $bte->getListeBouteille();
        include("vues/entete.php");
        include("vues/ajouter.php");
        include("vues/pied.php");
    }

    public function ajouterBouteilleCellier()
    {
        $bte = new BouteilleModel();
        $cellier = $bte->ajouterBouteilleCellier($_POST);
        header("Location: /accueil");
    }

    public function modificationBouteille($id_cellier)
    {
        $bte = new BouteilleModel();
        $listeBouteille = $bte->getListeBouteille();

        $data = $bte->getUnCelllier($id_cellier);
        // Vérification si id est du lien existe
        if (!$data) {
            header("Location: /accueil");
        } else {  
            include("vues/entete.php");
            include("vues/modifier.php");
            include("vues/pied.php");
        }
    }
   
}
