<?php
/* */

class UtilisateurModel extends Modele {

    public function getUsager($courriel){
        $result = $this->database->fetch("SELECT * FROM utilisateur WHERE uti_courriel = '$courriel'");
        return $result;
    }
    // public function getUsager($courriel){

    // }
 

}


?>