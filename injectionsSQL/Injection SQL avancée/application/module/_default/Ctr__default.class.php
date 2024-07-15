<?php
class Ctr__default extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("_default", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_index()
    {
        global $flag;
        $flag = "";
        if (isset($_SESSION['uti_profil'])) {
            if ($_SESSION['uti_profil'] == 1)
                $flag = "Flag {1P€U+C0MP£ÊXË}";
            else
                $flag = "";
        }
        require $this->gabarit;
    }
}
