<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_plat extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("plat", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$u = new Plat();
		if (isset($_POST['chercheplat']))
			$data = $u->selectByPlat($_POST['chercheplat']);
		else {
			$data = $u->selectAll();
			$_POST['chercheplat'] = "";
		}
		extract($_POST);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Plat();
		if ($id > 0)
			$row = $u->select($id);
		else
			$row = $u->emptyRecord();

		extract(array_map("mhe", $row));
		require $this->gabarit;
	}

	//$_POST
	function a_save()
	{
		if (isset($_POST["btSubmit"])) {
			$u = new Plat();
			$u->save($_POST);
			if ($_POST["pla_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Plat a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Plat a bien été mis à jour.";
		}
		header("location:" . hlien("plat"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Plat();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Plat a bien été supprimé.";
		}
		header("location:" . hlien("plat"));
	}
}
