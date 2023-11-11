<?php
require_once './Service/softwareService.php';
include_once 'View/view_loader.php';
include_once("Model/felhasznalok.php");

class Szoftverc_Controller
{

    private SoftwareService $softwareService;
    public $baseName = 'szoftver';

    public function __construct()
    {
        $this->softwareService = new SoftwareService();
    }

    public function main()
    {
        
        $view = new View_Loader($this->baseName . '_main');
        $user=unserialize( $_SESSION["user"]);
        $view->assign('teljesnev', $user->csaladi_nev." ".$user->utonev." ".$user->bejelentkezes);
        $view->assign('softwares', $this->softwareService->listAllSoftware());

        
    }
}
