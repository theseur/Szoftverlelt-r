<?php

require_once './../Model/db.php';
require_once './../Model/szoftver.php';
require_once './../Service/softwareService.php';

class SoftwareService
{

    private $dbModel;

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function listAllSoftware()
    {
        $query = "SELECT * FROM szoftver";
        $softwares = [];
        foreach ($this->dbModel->findAll($query) as $row) {
            array_push($softwares, new Szoftver($row));
        }
        return $softwares;
    }
}
