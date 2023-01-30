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





}

?>