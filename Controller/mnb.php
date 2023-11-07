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
        $allCurrency = $this->mnbService->getCurrencies();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $selectedCurrencies = [];
            if (isset($_POST['selectedCurrencies'])) {
                $selectedCurrencies = $_POST['selectedCurrencies'];
            } else {
                foreach ($allCurrency as $ac) {
                    $selectedCurrencies[] = $ac->name;
                }
            }

            if ($_GET['action'] === 'getExchangeData') {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];

                $data = $this->getExchangeData($startDate, $endDate, $selectedCurrencies);

                print_r($data);
                exit();
                
            } else if ($_GET['action'] === 'getDailyExchangeData') {
                $day = $_POST['day'];

                print_r($this->getExchangeData($day, $day, $selectedCurrencies));
                exit();

            } else if ($_GET['action'] === 'getMonthlyExchangeData') {
                $incomMonth = $_POST['month'];
                list($year, $month) = explode('-', $incomMonth);

                $firstDayOfMonth = date('Y-m-01', strtotime("$year-$month-01"));
                $lastDayOfMonth = date('Y-m-t', strtotime("$year-$month-01"));

                print_r(
                    $this->groupByMonthlyExchangeData(
                        $this->getExchangeData($firstDayOfMonth, $lastDayOfMonth, $selectedCurrencies)
                    )
                );
                exit();
            }
        }
        $view = new View_Loader(Mnb_Controller::HTML_PAGE);
        $defaultStartDate = date('Y-m-d', strtotime('-5 month'));
        $defaultCurrencies = ["USD", "EUR", "CZK"];
        $data = $this->getExchangeData($defaultStartDate, null, $defaultCurrencies);


        $view->assign('models', $data);
        $view->assign('currencies', $this->mnbService->getCurrencies());
    }

    private function getExchangeData($startDate, $endDate, $selectedCurrencies)
    {
        $selectedCurrenciesArray = [];
        if (is_array($selectedCurrencies)) {
            $selectedCurrenciesArray = $selectedCurrencies;
        } else {
            $selectedCurrenciesArray = [$selectedCurrencies];
        }
        $data = $this->mnbService->getExchangeData($startDate, $endDate, $selectedCurrenciesArray);
        return json_encode($data);
    }

    private function groupByMonthlyExchangeData($result)
    {
        $grouped_data = [];
        foreach (json_decode($result, true) as $item) {
            $date = $item['date'];
            $currency = $item['currency'];
            $value = $item['value'];

            if (!isset($grouped_data[$date])) {
                $grouped_data[$date] = [];
            }

            if (!isset($grouped_data[$date][$currency])) {
                $grouped_data[$date][$currency] = [];
            }

            $grouped_data[$date][$currency][] = $value;
        }
        return json_encode($grouped_data);
    }
}
