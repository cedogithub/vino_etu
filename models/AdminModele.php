<?php

class AdminModele extends Modele {

 /**
     * Cette methode sert a selectionner un utilisateur de la BD
     */
    public function getAdmin(){
        $result = $this->database->fetch("SELECT * FROM utilisateur WHERE uti_rol_id = '2'");
        return $result;
    }

    
    public function getNombreUsagers(){
        $result = $this->database->fetch("SELECT COUNT(*)
        FROM utilisateur;");
        return $result;
    }
    
    public function getNombreCelliers(){
        $result = $this->database->fetch("SELECT COUNT(*)
        FROM cellier;");
        return $result;
    }


    public function findNbParCelliers($id){
        $result = $this->database->fetch("SELECT COUNT(*) as nb
        FROM bouteille_du_cellier WHERE bdc_cel_id = '$id';");
        return $result;
    }
    public function getNbParCelliers(){
        $cellier = $this->database->fetchAll("SELECT *
        FROM cellier");
        foreach( $cellier as $key => $value ){
            $value['nombreBouteille'] = $this->findNbParCelliers($value['cel_id'])['nb'];

        }
        return $cellier;


    }





}

?>