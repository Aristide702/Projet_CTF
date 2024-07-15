<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_crustace extends Ctr_controleur implements I_crud
{

	public function __construct($action)
	{
		parent::__construct("crustace", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		$u = new Crustace();
		if (isset($_POST['crustaceNom']))
			$data = $u->selectByCrustace($_POST['crustaceNom']);
		else {
			$data = $u->selectAll();
			$_POST['crustaceNom'] = "";
		}
		extract($_POST);
		require $this->gabarit;
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$u = new Crustace();
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
			$u = new Crustace();
			$u->save($_POST);
			if ($_POST["cru_id"] == 0)
				$_SESSION["message"][] = "Le nouvel enregistrement Crustace a bien été créé.";
			else
				$_SESSION["message"][] = "L'enregistrement Crustace a bien été mis à jour.";
		}
		header("location:" . hlien("crustace"));
	}



	//param GET id 
	function a_delete()
	{
		if (isset($_GET["id"])) {
			$u = new Crustace();
			$u->delete($_GET["id"]);
			$_SESSION["message"][] = "L'enregistrement Crustace a bien été supprimé.";
		}
		header("location:" . hlien("crustace"));
	}
}
