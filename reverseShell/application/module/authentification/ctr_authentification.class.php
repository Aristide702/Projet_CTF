<?php
class Ctr_authentification extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("authentification", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_inscription()
    {
        extract($_POST);
        if (isset($_SESSION["uti_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        if (isset($btSubmit)) {
            //vérifier que $uti_login est unique
            if (!Utilisateur::estLoginUnique($uti_login)) {
                $_SESSION["message"][] = "$uti_login : ce nom d'utilisateur est déjà pris. Veuillez en saisir un autre.";
                require $this->gabarit;
                exit;
            }

            //vérifier que $uti_mdp==$uti_mdp2
            if ($uti_mdp != $uti_mdp2) {
                $_SESSION["message"][] = "La vérification du mot de passe à échouer. Veuillez vérifier votre mot de passe.";
                require $this->gabarit;
                exit;
            }

            //Tous est ok : enregistrement du nouvel utilisateur
            $_POST["uti_id"] = 0;
            $_POST["uti_mdp"] = bin2hex($_POST["uti_mdp"]);
            $_POST["uti_role"] = 3;
            (new Utilisateur)->save($_POST);
            $_SESSION["message"][] = "Bravo $uti_login ! Inscription réussie. Vous pouvez maintenant vous connecter.";
            //rediriger sur l'accueil
            header("location:" . hlien("_default"));
        } else {
            //affichage du formulaire
            extract((new Utilisateur())->emptyRecord());
            require $this->gabarit;
        }
    }

    public function a_connexion()
    {
        if (isset($_SESSION["uti_id"])) {
            $_SESSION["message"][] = "Tentative d'intrusion détectée...";
            require $this->gabarit;
            exit;
        }

        extract($_POST);
        if (isset($btSubmit)) {
            //récupérer en bdd l'utilisateur qui posséde $uti_login
            $row = Utilisateur::selectByLogin($uti_login);

            if ($row === false) {
                $_SESSION["message"][] = "Nom d'utilisateur ou mot de passe incorrect !";
                require $this->gabarit;
                exit;
            }

            //vérification du mot de passe
            if (bin2hex($uti_mdp) != $row["uti_mdp"]) {
                $_SESSION["message"][] = "Nom d'utilisateur ou mot de passe incorrect !";
                require $this->gabarit;
                exit;
            }

            //Connexion réussie
            extract($row);
            $_SESSION["uti_id"] = $uti_id;
            $_SESSION["uti_login"] = $uti_login;
            $_SESSION["uti_role"] = $uti_role;
            $_SESSION["message"][] = "bienvenu $uti_login !";
            header("location:" . hlien("_default"));
        } else {
            $uti_login = "";
            require $this->gabarit;
        }
    }

    public function a_deconnexion()
    {
        $_SESSION = [];
        $_SESSION["message"][] = "Vous êtes bien déconnecté.";
        header("location:" . hlien("_default"));
    }
}
