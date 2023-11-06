<?php
include_once("View/view_loader.php");
include_once("Model/gep.php");
class Gepek_Controller
{
    public $baseName = 'gepek';

    public function main()
    {
        $gepek = Gep::getAll();

        $view = new View_Loader($this->baseName . '_main');
        $view->assign('gepek', $gepek);
    }
}
