<?php
require_once './../Service/softwareService.php';
require_once './../Service/userService.php';
require_once './../includes/config.php';

class SoapService
{

    private SoftwareService $softwareService;
    private UserService $userService;

    public function __construct()
    {
        $this->softwareService = new SoftwareService();
        $this->userService = new UserService();
    }

    public function Szoftverek()
    {
        return $this->softwareService->listAllSoftware();
    }

    public function Felhasznalok()
    {
        return $this->userService->listUsers();
    }

    public function Gepek()
    {
        return $this->softwareService->listAllMachine();
    }

    public function TelepitettSzoftver($szoftverId)
    {
        return $this->softwareService->listTelepitesBySzoftverId($szoftverId);
    }

    public function GepreTelepitettSzoftverek(int $gepId)
    {
        return $this->softwareService->gepreTelepitettRendszerek($gepId);
    }

    public function Hirek()
    {
        return $this->userService->hirek();
    }

    public function FelhasznaloHirei(int $felhasznaloid)
    {
        //TODO: need service
        return null;
    }
}

$server = new SoapServer(null, ["uri" => SOAP_SERVER_URL]);
$server->setClass('SoapService');
$server->handle();
