<?php
class Menu

{
    public $id;
    public $nev;
    public $szulo;
    public $bejelentkezes;
    public $jogosultsag;
    public $sorrend;

    public function __construct($id, $nev, $szulo, $bejelentkezes, $jogosultsag, $sorrend)
    {
        $this->id=$id;
        $this->nev=$nev;
        $this->szulo=$szulo;
        $this->bejelentkezes=$bejelentkezes;   
        $this->jogosultsag=$jogosultsag;
        $this->sorrend=$sorrend;

    }

}

?>