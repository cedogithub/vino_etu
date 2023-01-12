<?php
class BouteilleModel extends Modele {
	const TABLE = 'vino__bouteille';
    	
	/**
	 * Requête SELECT de la liste de bouteilles SAQ
	 *
	 * @return array[] liste de bouteille SAQ 
	 */
	public function getListeBouteille()
	{
		return $this->database->fetchAll('SELECT * FROM vino__bouteille');
	}
	
		
	/**
	 * Requête SELECT des celliers
	 *
	 * @return array[] liste de celliers
	 */
	public function getListeCellier()
	{
		$requete ='SELECT 
				c.id as id_bouteille_cellier,
				c.id_bouteille, 
				c.date_achat, 
				c.garde_jusqua, 
				c.notes, 
				c.prix, 
				c.quantite,
				c.millesime, 
				b.id,
				b.nom, 
				b.type, 
				b.image, 
				b.code_saq, 
				b.url_saq, 
				b.pays, 
				b.description					
				from vino__cellier c 
				INNER JOIN vino__bouteille b ON c.id_bouteille = b.id
				INNER JOIN vino__type t ON t.id = b.type'; 

		return $this->database->fetchAll($requete);
	}
	
	/**
	 * Requête SELECT d'un cellier
	 *
	 * @param  int $id_cellier id du cellier
	 * @return array un cellier
	 */
	public function getUnCelllier($id_cellier)
	{
		
		$requete ='SELECT 
				c.id as id_bouteille_cellier,
				c.id_bouteille, 
				c.date_achat, 
				c.garde_jusqua, 
				c.notes, 
				c.prix, 
				c.quantite,
				c.millesime, 
				b.id,
				b.nom, 
				b.type, 
				b.image, 
				b.code_saq, 
				b.url_saq, 
				b.pays, 
				b.description					
				from vino__cellier c 
				INNER JOIN vino__bouteille b ON c.id_bouteille = b.id
				INNER JOIN vino__type t ON t.id = b.type
				WHERE c.id = ?'; 

		return $this->database->fetch($requete, $id_cellier);
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
		 
		//echo $nom;
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
		$this->database->query('INSERT INTO vino__cellier ? ', [ 
			'id_bouteille' => $data['id_bouteille'],
			'date_achat' => $data['date_achat'],
			'garde_jusqua' => $data['garde_jusqua'],
			'notes' => $data['notes'],
			'prix' => $data['prix'],
			'quantite' => $data['quantite'],
			'millesime' => $data['millesime'],
		]);
        
		return $this->database->getInsertId();
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
		//TODO : Valider les données.
			
			
		$requete = "UPDATE vino__cellier SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id = ". $id;
		//echo $requete;
        $res = $this->_db->query($requete);
        
		return $res;
	}
}




?>