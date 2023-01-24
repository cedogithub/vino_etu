<?php
/* */

class UtilisateurModel extends Modele {

    /**
     * Cette methode sert a afficher tout les utilisateur de la BD
     */
    public function getUsager($courriel){
        $result = $this->database->fetch("SELECT * FROM utilisateur WHERE uti_courriel = '$courriel'");
        return $result;
    }
    
    /**
     * Cette methode sert a creer un utilisateur dans la BD
     * @param Array $data Tableau des donnes representant un utilisateur dans la BD
     */
    public function creerUsager($data){
            
        $this->database->query('INSERT INTO utilisateur', [ 
			'uti_courriel' => $data['uti_courriel'],
			'uti_mdp' => password_hash($data['uti_mdp'], PASSWORD_DEFAULT),
			'uti_nom' => $data['uti_nom'],
			'uti_prenom' => $data['uti_prenom'],
			'uti_rol_id' => '1'
        ]);
 
        return $this->database->getInsertId();
    }
    
 

}


?>