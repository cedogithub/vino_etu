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
        $result = $this->database->fetch("SELECT COUNT(*) as nbUsager
        FROM utilisateur;");
        return $result['nbUsager'];
    }
    
    public function getNombreCelliers(){
        $result = $this->database->fetch("SELECT COUNT(*) as nbCelliers
        FROM cellier;");
        return $result['nbCelliers'];
    }


    public function findNbParCelliers($id){
        $result = $this->database->fetch("SELECT COUNT(*) as nb
        FROM bouteille_du_cellier WHERE bdc_cel_id = '$id';");
        return $result;
    }
    public function getNbBouteille24h($id){
        $result = $this->database->fetch("SELECT COUNT(*) FROM bouteille_du_cellier WHERE bdc_date_achat > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
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
    public function findBouteilleParUsers(){
            return $this->database->fetchAll("SELECT COUNT(bouteille_du_cellier.bdc_bout_id) as nbBouteille, cellier.cel_id FROM `cellier` JOIN bouteille_du_cellier on cellier.cel_id = bouteille_du_cellier.bdc_cel_id group by cellier.cel_id;");
        
    }

    


}

?>