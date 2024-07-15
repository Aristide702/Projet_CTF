<?php

/**
Classe créé par le générateur.
 */
class Crustace extends Table
{
	public function __construct()
	{
		parent::__construct("crustace", "cru_id");
	}
	static public function selectByCrustace(string $crustaceNom)
	{
		$sql = "select cru_nom, cru_nomlatin, cru_description, cru_image from crustace where cru_nom like '%$crustaceNom%';";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}

	public function selectAll(): array
	{
		$sql = "select cru_nom, cru_nomlatin, cru_description, cru_image from crustace;";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}
}
