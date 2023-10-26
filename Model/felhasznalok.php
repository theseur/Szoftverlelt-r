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

}

?>