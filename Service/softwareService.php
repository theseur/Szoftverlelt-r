<?php

require_once __DIR__ . '/../Model/db.php';
require_once __DIR__ . '/../Model/szoftver.php';
require_once __DIR__ . '/../Service/softwareService.php';

class SoftwareService
{

    private $dbModel;

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function listAllSoftware()
    {
        $query = "SELECT * FROM szoftver where (deactivate=0 OR deactivate = NULL)";
        $softwares = [];
        foreach ($this->dbModel->findAll($query) as $row) {
            array_push($softwares, new Szoftver($row));
        }
        return $softwares;
    }
}
