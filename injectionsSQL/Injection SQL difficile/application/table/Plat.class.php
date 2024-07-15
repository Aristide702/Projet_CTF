<?php

/**
Classe créé par le générateur.
 */
class Plat extends Table
{
	public function __construct()
	{
		parent::__construct("plat", "pla_id");
	}

	static public function selectByPlat(string $chercheplat)
	{
		$sql = "select * from plat where pla_nom like '%$chercheplat%';";
		$result = self::$link->query($sql);
		return $result->fetchAll();
	}
}
