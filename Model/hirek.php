<?php
class Hirek

{
    public $id;
    public $hir;
    public $datum;
    public $userid;
    public $deactivate;

    public function __construct($id, $hir, $datum, $userid, $deactivate)
    {
        $this->id=$id;
        $this->hir=$hir;
        $this->datum=$datum;
        $this->userid=$userid;   
        $this->deactivate=$deactivate;

    }
    
    public static function getAll()
    {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $data=$pdo->query("Select * from hirek 
        where deactivate =0
        order by id desc");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Hirek($row['id'],$row['hir'],$row['datum'], $row['userid'], $row['deactivate']);
            array_push($ures,$ujgep);
        }
        return $ures;
    }

    public static function modositaskiolvas($id)
    {
        $pdo =new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $data=$pdo->query("Select * from hirek
        WHERE id=$id");

    }

    public static function modositas($id, $hir)
    {
        $pdo =new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $data=$pdo->query("UPDATE hirek 
        SET hir='$hir'
        where id=$id
        ");

    }
    public static function torles($id)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=szoftverleltar", 'root', '');
        $data=$pdo->query("UPDATE hirek
        SET deactivate = 1
        WHERE id=$id
        ");

    }
    public static function beillesztes($userid, $hir)
    {
        
        $pdo = new PDO("mysql:host=localhost;dbname=szoftverleltar", 'root', '');
        $data=$pdo->query("INSERT into hirek (hir,userid)
        VALUES('$hir',$userid)");

    }

}

?>