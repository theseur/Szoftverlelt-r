<?php
class Gep
{
    public $id;
    public $hely;
    public $tipus;
    public $ipcim;
    public $deactivate;

    public function __construct($id, $hely, $tipus, $ipcim, $deactivate)
    {
        $this->id=$id;
        $this->hely=$hely;
        $this->tipus=$tipus;
        $this->ipcim=$ipcim;
        $this->deactivate=$deactivate;

    }
    public static function getAll()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=szoftverleltar", 'root', '');
        $data=$pdo->query("Select * from gep");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Gep($row['id'],$row['hely'],$row['tipus'], $row['ipcim'], $row['deactivate']);
            array_push($ures,$ujgep);
        }
        return $ures;
    }

}



?>