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

	//uniquement update de nom prenom et profil
	public function adminSave($row)
	{
		extract($row);
		$uti_profil = $uti_profil ?? 3;
		$sql = "update Utilisateur set uti_nom=:uti_nom, uti_prenom=:uti_prenom, uti_profil=:uti_profil where uti_id=:uti_id";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":uti_nom", $uti_nom);
		$statement->bindValue(":uti_prenom", $uti_prenom);
		$statement->bindValue(":uti_profil", $uti_profil);
		$statement->bindValue(":uti_id", $uti_id);
		$statement->execute();

		return $row[$this->pk];
	}

	static public function estLoginUnique(string $uti_login): bool
	{
		$sql = "select * from utilisateur where uti_login=:login";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login", $uti_login);
		$statement->execute();
		if ($statement->rowCount() > 0)
			return false;
		else
			return true;
	}

	static public function selectByLogin(string $uti_login, string $uti_mdp)
	{
		$sql = "select * from utilisateur where (uti_login='$uti_login') and uti_mdp='$uti_mdp';";
		$result = self::$link->query($sql);
		return $result->fetch();
	}

	static public function rechercheParLogin(string $uti_login)
	{
		$sql = "select * from utilisateur where uti_profil=3 and uti_login like :login order by uti_nom";
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":login", '%' . $uti_login . '%');
		$statement->execute();
		return $statement->fetchAll();
	}
}
