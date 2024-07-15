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
            $_SESSION["message"][] = "Vous êtes déja connecté...";
            require $this->gabarit;
            exit;
        }

        if (isset($btSubmit)) {
            //vérifier que $uti_mdp==$uti_mdp2
            if ($uti_mdp != $uti_mdp2) {
                $_SESSION["message"][] = "Les deux mots de passe entrés ne sont pas identiques. Veuillez vérifier votre mot de passe.";
                require $this->gabarit;
                exit;
            }

            //Tous est ok : enregistrement du nouvel utilisateur
            $_POST["uti_id"] = 0;
            $_POST["uti_mdp"] = password_hash($_POST["uti_mdp"], PASSWORD_DEFAULT);
            $_POST["uti_profil"] = 3;
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
            header("location:" . hlien("_default"));
            $_SESSION["message"][] = "Vous êtes déjà connecté !";
            require $this->gabarit;
            exit;
        }

        extract($_POST);
        if (isset($btSubmit)) {
            //Vérification si possibilité d'injection SQL
            if (sqlDetect(strtolower($uti_login)) or sqlDetect(strtolower($uti_mdp))) {
                $_POST = [];
                $_SESSION["message"][] = "Tentative d'injection SQL détectée !";
                require $this->gabarit;
                exit;
            }
            //récupérer en bdd l'utilisateur qui posséde $uti_login
            $row = Utilisateur::selectByLogin($_POST['uti_login'], $_POST["uti_mdp"]);
            if ($row === false) {
                $_SESSION["message"][] = "Nom d'utilisateur ou mot de passe incorrect ! Veuillez réessayer";
                require $this->gabarit;
                exit;
            }

            //Connexion réussie
            extract($row);
            $_SESSION["uti_id"] = $uti_id;
            $_SESSION["uti_nom"] = $uti_nom;
            $_SESSION["uti_prenom"] = $uti_prenom;
            $_SESSION["uti_login"] = $uti_login;
            $_SESSION["uti_profil"] = $uti_profil;
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
