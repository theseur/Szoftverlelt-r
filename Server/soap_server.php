<?php
require_once './../Service/softwareService.php';
require_once './../includes/config.php';

class SoapService
{
    private $x = 50;

    private SoftwareService $softwareService;

    public function __construct()
    {
        $this->softwareService = new SoftwareService();
    }

    public function szoveg()
    {
        return "Hello";
    }
    public function ketszeres($y)
    {
        return 2 * $y;
    }
    public function ido()
    {
        return date("Y-m-d H:i:s", time());
    }
    public function get3X()
    {
        return $this->x * 3;
    }
    public function adatok()
    {
        $eredmeny = array();
        $eredmeny[] = "Szöveg1";
        $eredmeny[] = 20;
        $eredmeny[] = 25.34;
        return $eredmeny;
    }

    public function Szoftverek()
    {
        return $this->softwareService->listAllSoftware();
    }

    public function Felhasznalok()
    {
        //TODO: need service
        return null;
    }

    public function Gepek()
    {
        //TODO: need service
        return null;
    }

    public function SzoftverTelepitesek()
    {
        //TODO: need service
        return null;
    }

    public function Hirek()
    {
        //TODO: need service
        return null;
    }
}

$server = new SoapServer(null, ["uri" => SOAP_SERVER_URL]);
$server->setClass('SoapService');
$server->handle();
