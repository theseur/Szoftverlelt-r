<?php
class Szoftver
{
    public $id;
    public $nev;
    public $kategoria;
    public $deactivate;

    public function __construct($id, $nev, $kategoria, $deactivate)
    {
        $this->id=$id;
        $this->nev=$nev;
        $this->kategoria=$kategoria;
        $this->deactivate=$deactivate;

    }
    public static function getAll()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=szoftverleltar", 'root', '');
        $data=$pdo->query("Select * from szoftver");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Szoftver($row['id'],$row['nev'],$row['kategoria'], $row['deactivate']);
            array_push($ures,$ujgep);
        }
        return $ures;
    }


}

?>