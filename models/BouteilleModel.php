<?php
class BouteilleModel extends Modele {
    	
	/**
	 * Requête SELECT des bouteilles d'un cellier
	 *
	 * @return array[] liste de bouteilles d'un cellier
	 */
	public function getBouteillesCellier()
	{
		$requete ='SELECT *			
				from bouteille_du_cellier 
				INNER JOIN cellier ON cellier.cel_id = bouteille_du_cellier.bdc_cel_id
				WHERE cellier.cel_id = ?'; 

		return $this->database->fetchAll($requete, '1');
	}
	
	/**
	 * Requête SELECT d'une bouteille d'un cellier
	 *
	 * @param  int $id_cellier id du cellier
	 * @return array un cellier
	 */
	public function getUneBouteilleCellier($id_cellier)
	{
		
		
	}
	
	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */
       
	public function autocomplete($nom, $nb_resultat=10)
	{
		
		$rows = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		$requete ='SELECT id, nom FROM vino__bouteille where LOWER(nom) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		return $this->database->fetchAll($requete);
	}
	
	
	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function ajouterBouteilleCellier($data)
	{
		$this->database->query('INSERT INTO bouteille_du_cellier ? ', [ 
			'bdc_cel_id' => $data['bdc_cel_id '],
			'bdc_bout_id' => $data['bdc_bout_id'],
			'bdc_date_achat' => $data['bdc_date_achat'],
			'bdc_garde_jusqua' => $data['bdc_garde_jusqua'],
			'bdc_notes' => $data['bdc_notes'],
			'bdc_quantite' => $data['bdc_quantite'],
			'bdc_millesime' => $data['bdc_millesime']
		]);
        
		return $this->database->getInsertId();
	}

	public function modifierBouteilleCellier()
	{
		$result = $this->database->query('UPDATE users SET', [
			'bdc_bout_id' => $data['bdc_bout_id'],
			'bdc_date_achat' => $data['bdc_date_achat'],
			'bdc_garde_jusqua' => $data['bdc_garde_jusqua'],
			'bdc_notes' => $data['bdc_notes'],
			'bdc_quantite' => $data['bdc_quantite'],
			'bdc_millesime' => $data['bdc_millesime']
		], 'WHERE bdc_cel_id = ?', $data['bdc_cel_id']);

		$result->getRowCount();
	}
	
	
	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		$requete = "UPDATE vino__cellier SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id = ". $id;
        $res = $this->database->query($requete);
		return $res->getRowCount();
	}
}




?>


