<?php
/* */

class UtilisateurModel extends Modele {

    public function getUsager($courriel){
        $result = $this->database->fetch("SELECT * FROM utilisateur WHERE uti_courriel = '$courriel'");
        return $result;
    }
    // public function getUsager($courriel){

    // }

    public function creerUsager($data){
            
        $this->database->query('INSERT INTO utilisateur ?', [ 
            'uti_id' => $data['uti_id'],
			'uti_courriel' => $data['uti_courriel'],
			'uti_mdp' => $data['uti_mdp'],
			'uti_nom' => $data['uti_nom'],
			'uti_prenom' => $data['uti_prenom'],
			'uti_dcc' => $data['uti_dcc'],
			'uti_rol_id	' => $data['uti_rol_id	']// here can be omitted question mark
            
        ]);
        
      
    }    
 

}


?>