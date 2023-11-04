<?php
class Telepites
{
    public $id;
    public $gepid;
    public $szoftverid;
    public $verzio;
    public $datum;
    public $deactivate;

    public function __construct($id, $gepid, $szoftverid, $verzio, $datum, $deactivate)
    {
        $this->id=$id;
        $this->gepid=$gepid;
        $this->szoftverid=$szoftverid;
        $this->verzio=$verzio;
        $this->datum=$datum;
        $this->deactivate=$deactivate;

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