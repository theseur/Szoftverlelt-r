<?php
class Szoftver{
    
    public $id;
    public $nev;
    public $kategoria;
    public $deactivate;


    public function __construct($row){
        $this->id=$row['id'];
        $this->nev=$row['nev'];
        $this->kategoria=$row['kategoria'];
        $this->deactivate=$row['deactivate'];
    }

}
