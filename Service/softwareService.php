<?php

require_once __DIR__ . '/../Model/db.php';
require_once __DIR__ . '/../Model/szoftver.php';
require_once __DIR__ . '/../Model/telepites.php';

class SoftwareService
{

    private $dbModel;

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function listAllSoftware()
    {
        $query = "SELECT * FROM szoftver WHERE (deactivate=0 OR deactivate = NULL)";
        $softwares = [];
        foreach ($this->dbModel->findAll($query) as $row) {
            $softwares[] = new Szoftver($row);
        }
        return $softwares;
    }

    public function listTelepitesBySzoftverId(int $szoftverId)
    {
        $query = "SELECT DISTINCT 
                    sz.nev as szoftverName,
                    sz.kategoria as szoftverKategoria, 
                    g.hely,
                    g.tipus,
                    g.ipcim,
                    g.deactivate,
                    t.verzio, 
                    t.datum
                FROM telepites t 
                    INNER JOIN szoftver sz ON t.szoftverid = sz.id 
                    INNER JOIN gep g ON t.gepid = g.id
                WHERE sz.id = ?";

        $telepites = [];
        $stmt = $this->dbModel->getPDO()->prepare($query);
        $stmt->execute([$szoftverId]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $telepites[] = new Telepites($row);
        }
        return $telepites;
    }

    public function gepreTelepitettRendszerek(int $gepId)
    {
        $query = "SELECT DISTINCT 
                    sz.nev as szoftverName,
                    sz.kategoria as szoftverKategoria, 
                    g.hely,
                    g.tipus,
                    g.ipcim,
                    g.deactivate,
                    t.verzio, 
                    t.datum
                FROM telepites t 
                    INNER JOIN szoftver sz ON t.szoftverid = sz.id 
                    INNER JOIN gep g ON t.gepid = g.id
                WHERE g.id = ?";

        $telepites = [];
        $stmt = $this->dbModel->getPDO()->prepare($query);
        $stmt->execute([$gepId]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $telepites[] = new Telepites($row);
        }
        return $telepites;
    }
}
