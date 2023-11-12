<?php
class Gep
{
    public $id;
    public $hely;
    public $tipus;
    public $ipcim;
    public $deactivate;

    public function __construct($row)
    {
        $this->id=$row['id'];
        $this->hely=$row['hely'];
        $this->tipus=$row['tipus'];
        $this->ipcim=$row['ipcim'];
        $this->deactivate=$row['deactivate'];

    }
    public static function getAll()
    {
        $pdo =new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $data=$pdo->query("Select * from gep
        where deactivate =0");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Gep($row);
            array_push($ures,$ujgep);
        }
        return $ures;
    }

}



?>