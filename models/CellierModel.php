<?php
class CellierModel extends Modele {
    	    
    /**
     * requête INSERT d'un cellier (suite création du compte)
     *
     * @param  mixed $id_utilisateur
     * @return void
     */
    public function insertion($id_utilisateur)
    {
        $this->database->query('INSERT INTO cellier ', [ 
            'cel_nom' => "Cellier # $id_utilisateur",
            'cel_uti_id' => $id_utilisateur
        ]);
        
        return $this->database->getInsertId(); 
    }
    
    /**
     * requête SELECT d'un cellier
     *
     * @param  mixed $id_utilisateur
     * @return void
     */
    public function getCellier($id_utilisateur)
    {
        return $this->database->fetch('SELECT * FROM cellier WHERE cel_uti_id  = ?', $id_utilisateur);
    }

    public function getAllCelliers($id_utilisateur){
    
        return $this->database->fetchAll('SELECT * FROM cellier WHERE cel_uti_id  = ?', $id_utilisateur);
    }
    
        
    /**
     * requête AJOUTER un nouveau cellier
     *
     * @param  mixed $id_utilisateur
     * @param  mixed $cel_nom
     * @return void
     */
    public function ajoutNouvCellier($id_utilisateur, $cel_nom) 
    {
        $this->database->query('INSERT INTO cellier', [
            'cel_nom' => $cel_nom,
            'cel_uti_id'=> $id_utilisateur
        ]);
    }

        
    /**
     * requête SUPPRESSION d'un cellier
     *
     * @return void
     */
    public function supprimerCellier($cel_id)
    {
        $this->database->query('DELETE FROM cellier WHERE cel_id = ?', $cel_id);
    }
    
    
    /**
     * requete MODIFIER du nom d'un Cellier
     *
     * @param  mixed $cel_id
     * @param  mixed $cel_nom
     * @return void
     */
    public function modifierCellier($cel_id, $cel_nom)
    {
        $this->database->query('UPDATE cellier SET', [
            'cel_nom' => $cel_nom,
        ], 'WHERE cel_id = ?', $cel_id);
    }
}

?>


