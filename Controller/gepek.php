<?php
include_once("View/view_loader.php");
include_once("Model/gep.php");
include_once("Model/felhasznalok.php");
class Gepek_Controller
{
    public $baseName = 'gepek';

    public function main()
    {
        $gepek = Gep::getAll();

        $view = new View_Loader($this->baseName . '_main');
        $user=unserialize( $_SESSION["user"]);
        $view->assign('teljesnev', $user->csaladi_nev." ".$user->utonev." ".$user->bejelentkezes);
        $view->assign('gepek', $gepek);
    }
}
