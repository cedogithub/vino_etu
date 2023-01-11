<?php
class Modele {
	
    protected $database;
	function __construct ()
	{
		$dsn = 'mysql:host='.HOST.';dbname='.DATABASE;
		$user = USER;
		$password = PASSWORD;
		$this->database = new Nette\Database\Connection($dsn, $user, $password);
	}
	
}



?>