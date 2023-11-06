<?php
class Telepites
{
    public $szoftverName;
    public $szoftverKategoria;
    public $hely;
    public $tipus;
    public $ipcim;
    public $deactivate;
    public $verzio;
    public $datum;

    public function __construct($row){
        $this->szoftverName=$row['szoftverName'];
        $this->szoftverKategoria=$row['szoftverKategoria'];
        $this->hely=$row['hely'];
        $this->tipus=$row['tipus'];
        $this->ipcim=$row['ipcim'];
        $this->deactivate=$row['deactivate'];
        $this->verzio=$row['verzio'];
        $this->datum=$row['datum'];
    }

  
    public static function getAll()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=szoftverleltar", 'root', '');
        $data=$pdo->query("Select * from telepites
        where deactivate =0
        ");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Telepites($row['id'],$row['gepid'],$row['szoftverid'], $row['verzio'], $row['datum'], $row['deactivate']);
            array_push($ures,$ujgep);
        }
        return $ures;
    }

}



?>