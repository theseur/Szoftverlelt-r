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

}

?>