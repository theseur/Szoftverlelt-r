<?php

require_once __DIR__ . '/../Model/db.php';
require_once __DIR__ . '/../Model/szoftver.php';
require_once __DIR__ . '/../Model/gep.php';
require_once __DIR__ . '/../Model/telepites.php';

class SoftwareService
{

    private $dbModel;

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function listAllSoftware(): array
    {
        $query = "SELECT * FROM szoftver";
        $softwares = [];
        foreach ($this->dbModel->findAll($query) as $row) {
            $softwares[] = new Szoftver($row);
        }
        return $softwares;
    }

    public function listAllMachine(): array
    {
        $machines = [];
        foreach ($this->dbModel->findAll("SELECT * FROM gep") as $row) {
            $machines[] = new Gep($row);
        }
        return $machines;
    }

    public function listTelepitesBySzoftverId($szoftverId): array
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

        return $this->wrapResult($query, $szoftverId);
    }

    public function gepreTelepitettRendszerek($gepId): array
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

        return $this->wrapResult($query, $gepId);
    }

    private function wrapResult(string $query, $parameter): array
    {
        $telepites = [];
        $stmt = $this->dbModel->getPDO()->prepare($query);
        $stmt->execute([$parameter]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $telepites[] = new Telepites($row);
        }
        return $telepites;
    }
}
