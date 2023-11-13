<?php
class Felhasznalok

{
    public $id;
    public $csaladi_nev;
    public $utonev;
    public $bejelentkezes;
    public $jelszo;
    public $jogosultsag;
    public $deactivate;

    public function __construct($id, $csaladi_nev, $utonev, $bejelentkezes, $jelszo, $jogosultsag, $deactivate)
    {
        $this->id=$id;
        $this->csaladi_nev=$csaladi_nev;
        $this->utonev=$utonev;
        $this->bejelentkezes=$bejelentkezes;   
        $this->jelszo=$jelszo;
        $this->jogosultsag=$jogosultsag;
        $this->deactivate=$deactivate;

    }

    public static function instanceof($row)
    {
        return new self(
                $row['id'],
                $row['csaladi_nev'],
                $row['utonev'],
                null,
                null,
                $row['jogosultsag'],
                $row['deactivate']
        );
    }

    public static function login($bejelentkezes, $jelszo)
    {

        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $data=$pdo->query("Select * from felhasznalok 
        where bejelentkezes = '$bejelentkezes'
        and
        jelszo = sha1('$jelszo')
        ");
        $ures=[];
        foreach ($data as $row )
        {
            $ujgep= new Felhasznalok($row['id'],$row['csaladi_nev'],$row['utonev'], 
            $row['bejelentkezes'], $row['jelszo'],$row['jogosultsag'], $row['deactivate']);
            array_push($ures,$ujgep);
        }
        return $ures;

    }

    public static function regisztacio($csaladi_nev, $utonev, $bejelentkezes, $jelszo)
    {
        $sikeresreg=false;
        if($_POST["jelszo"]!=$_POST["jelszo1"])
        {
            return  $sikeresreg;
        }
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $stmt = $pdo->prepare("Insert into felhasznalok (csaladi_nev, utonev, bejelentkezes,jelszo)
        Values(?,?,?,sha1(?))");
        $stmt->execute([$csaladi_nev,$utonev,$bejelentkezes, $jelszo]);
       
        return  $sikeresreg;

    }

}
