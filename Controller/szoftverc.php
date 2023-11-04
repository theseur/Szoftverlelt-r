<?php
require_once './Service/softwareService.php';
include_once 'View/view_loader.php';

class Szoftverc_Controller
{

    //private SoftwareService $softwareService;
    private $softwareService;
    public $baseName = 'szoftver';

    public function __construct()
    {
        $this->softwareService = new SoftwareService();
    }

    public function main()
    {
        $view = new View_Loader($this->baseName . '_main');
        $view->assign('softwares', $this->softwareService->listAllSoftware());
    }
}
