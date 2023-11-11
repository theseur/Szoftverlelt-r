<?php
include_once 'View/view_loader.php';
require_once './Service/softwareService.php';
include_once("Model/telepites.php");
include_once("Model/felhasznalok.php");

class Telepitesc_Controller
{
    private $baseName = 'telepites';
    private SoftwareService $softwareService;

    public function __construct()
    {
        $this->softwareService = new SoftwareService();
    }

    public function main()
    {
        $view = new View_Loader($this->baseName . '_main');
        $user=unserialize( $_SESSION["user"]);
        $view->assign('teljesnev', $user->csaladi_nev." ".$user->utonev." ".$user->bejelentkezes);
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['sw_id'])) {

            $sw_id = $_GET['sw_id'];

            $gepek =  $this->softwareService->listTelepitesBySzoftverId($sw_id);
            $view->assign('szoftver', $gepek[0]);
            $view->assign('gepek', $gepek);
        } else if (isset($_GET['gep_id'])) {

            $gep_id = $_GET['gep_id'];
            $szoftverek =  $this->softwareService->gepreTelepitettRendszerek($gep_id);
            $view->assign('gep', $szoftverek[0]);
            $view->assign('szoftverek', $szoftverek);
        } else {

            header("Location: " . HOME_PAGE);
            exit();
        }
    }
}
