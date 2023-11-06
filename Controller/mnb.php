<?php
include_once 'View/view_loader.php';
require_once 'mnb/MNBService.php';


class Mnb_Controller
{
    const HTML_PAGE = 'mnb_arfolyamok';
    private MNBService $mnbService;

    public function __construct()
    {
        $this->mnbService = new MNBService();
    }

    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'getExchangeData') {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $selectedCurrencies = $_POST['selectedCurrencies'];

            $data = $this->getExchangeData($startDate, $endDate, $selectedCurrencies);

            print_r($data);
            exit();
        } else {
            $defaultStartDate = date('Y-m-d', strtotime('-5 month'));
            $defaultCurrencies = ["USD", "EUR", "CZK"];
            $data = $this->getExchangeData($defaultStartDate, null, $defaultCurrencies);

            $view = new View_Loader(Mnb_Controller::HTML_PAGE);
            $view->assign('models', $data);
            $view->assign('currencies', $this->mnbService->getCurrencies());
        }
    }

    public function getExchangeData($startDate, $endDate, $selectedCurrencies)
    {
        $data = $this->mnbService->getExchangeData($startDate, $endDate, $selectedCurrencies);
        return json_encode($data);
    }
}
