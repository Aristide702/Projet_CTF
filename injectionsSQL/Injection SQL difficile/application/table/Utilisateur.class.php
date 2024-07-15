<?php

/**
Classe créé par le générateur.
 */
class Utilisateur extends Table
{
	public function __construct()
	{
		parent::__construct("utilisateur", "uti_id");
	}	

	static public function estLoginUnique(string $uti_login) : bool {
		$sql="select * from utilisateur where uti_login=:login";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login", $uti_login);
		$statement->execute();
		if ($statement->rowCount()>0)
			return false;
		else 
			return true;
	}

	static public function selectByLogin(string $uti_login) {
		$sql="select * from utilisateur where uti_login=:login";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login", $uti_login);
		$statement->execute();
		return $statement->fetch();
	}
}
