<?php
require_once 'model/db.php';
include_once 'View/view_loader.php';
include_once 'Model/szoftver.php';

class Szoftverc_Controller
{

    private $dbModel;
    public $baseName = 'szoftver';

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function main()
    {
        $view = new View_Loader($this->baseName . '_main');
        $view->assign('softwares', $this->listAllSoftware());
    }

    private function listAllSoftware()
    {
        $query = "SELECT * FROM szoftver";
        $softwares = [];
        foreach ($this->dbModel->findAll($query) as $row) {
            array_push($softwares, new Szoftver($row));
        }
        return $softwares;
    }
}
