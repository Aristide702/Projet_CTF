<?php
class Ctr_nouveau extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("nouveau", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_index()
    {
        checkAllow(1);
        // Scan du répertoire .nouveau
        $dir = "../application/module/nouveau";
        $fichiers = scandir($dir);
        // Préparation de laffichage des pages créées
        $files = [];
        $pattern = ["/vue_nouveau_/", "/.php/"];
        $replace = "";
        for ($i = 3; $i < count($fichiers); $i++) {
            $name = preg_replace($pattern, $replace, $fichiers[$i]);
            $files[] = $name;
        }
        require $this->gabarit;
    }

    public function a_create()
    {
        checkAllow(1);
        if (isset($_POST['btCreate'])) {
            extract($_POST);
            // Effacement des caractères possiblement dérangeant pour le titre du fichier ou bien le nom de la fonction dans le controleur
            $fname = preg_replace("/\W/", "", $fname);
            //Vérification après le filtre dans le cas où le nom serait vide
            if ($fname == "" or $fname == null) {
                $_SESSION["message"][] = "Le nom du fichier est vide ou ne contient que des caractères interdits, veuillez n'utiliser que des lettres simples (sans accent de préférence) !";
                require $this->gabarit;
                exit;
            } else if ($fname == "index" or $fname == "create") {
                $_SESSION["message"][] = "Le nom du fichier ne peut être ni index ni create !";
                require $this->gabarit;
                exit;
            }
            $filedir = "../application/module/nouveau/vue_nouveau_" . $fname . ".php";
            // Ouverture du fichier ou création de celui-ci s'il n'existe pas
            $file = fopen($filedir, "w");
            // Écriture du texte dans le fichier
            fwrite($file, $fcode);
            fclose($file);

            // Récupération du code du controleur dans une string
            $ctr = trim(file_get_contents("../application/module/nouveau/Ctr_nouveau.class.php"));
            // Avant création de l'action, vérification au cas où celle-ci existe déjà
            if (strpos($ctr, "function a_" . $fname) == false) {
                // Si l'action n'existe pas, alors création de celle-ci
                // Retirer l'accolade fermante à la fin de la classe
                $ctr = substr($ctr, 0, -1);
                // Concaténation de la nouvelle action au controleur
                $ctr .= "\n    public function a_" . $fname . "() {\n       checkAllow(1);\n        require \$this->gabarit;\n    } \n}";
                $ctrdir = "../application/module/nouveau/ctr_nouveau.class.php";
                // Ouverture du fichier
                $controleur = fopen($ctrdir, "w");
                // Écriture du texte dans le controleur
                fwrite($controleur, $ctr);
                fclose($controleur);
            }
            header("Location:" . hlien("nouveau", "index"));
        }
        require $this->gabarit;
    }

    // Fonctions créées via le site juste en-dessous

    public function a_kamoulox() {
       checkAllow(1);
        require $this->gabarit;
    } 
}