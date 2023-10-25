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

}

?>