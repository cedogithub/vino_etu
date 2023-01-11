<?php
class Modele {
	
    protected $database;
		
	/**
	 * Récupère une instance de la connexion à la base de données.
	 *
	 * @return void
	 */
	function __construct ()
	{
		$dsn = 'mysql:host='.HOST.';dbname='.DATABASE;
		$user = USER;
		$password = PASSWORD;
		$this->database = new Nette\Database\Connection($dsn, $user, $password);
	}
	
}



?>