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
    
    public function afficherUnCellier($id_cellier)
    {
        $bte = new BouteilleModel();
        $data = $bte->getUnCelllier($id_cellier);

        include("vues/entete.php");
        include("vues/modifier.php");
        include("vues/pied.php");
    }
   
}
