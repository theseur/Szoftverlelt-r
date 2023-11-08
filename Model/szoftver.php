<?php
class Szoftver
{

    public $id;
    public $nev;
    public $kategoria;
    public $deactivate;


    public function __construct($row)
    {
        $this->id = $row['id'];
        $this->nev = $row['nev'];
        $this->kategoria = $row['kategoria'];
        $this->deactivate = $row['deactivate'];
    }

    public function __toString()
    {
        $str = "Szoftver [ id= " . $this->id . ", nev= "
            . $this->nev . ", kategoria= " . $this->kategoria . ", active = "
            . ($this->deactivate === null || $this->deactivate === 0) ? "igen" : "nem"
            . "<br>";
        return $str;
    }
}
