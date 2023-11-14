<?php
class Telepites
{
    public $szoftverName;
    public $szoftverKategoria;
    public $hely;
    public $tipus;
    public $ipcim;
    public $deactivate;
    public $verzio;
    public $datum;

    public function __construct($row){
        $this->szoftverName=$row['szoftverName'];
        $this->szoftverKategoria=$row['szoftverKategoria'];
        $this->hely=$row['hely'];
        $this->tipus=$row['tipus'];
        $this->ipcim=$row['ipcim'];
        $this->deactivate=$row['deactivate'];
        $this->verzio=$row['verzio'];
        $this->datum=$row['datum'];
    }

}
