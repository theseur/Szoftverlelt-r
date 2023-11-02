<?php
include_once 'View/view_loader.php';
require_once 'mnb/mnbSoapClient.php';


class Mnb_Controller
{
    const HTML_PAGE = 'mnb_arfolyamok';
    private MNBSoapClient $soapClient;

    public function __construct()
    {
        $this->soapClient = new MNBSoapClient();
    }

    public function main()
    {
        $view = new View_Loader(Mnb_Controller::HTML_PAGE);

        $view->assign('models', json_encode($this->getExchangeData()));
        $view->assign('currencies', $this->soapClient->getCurrencies());
    }

    private function getExchangeData()
    {
        $exchangeRates = $this->soapClient->getExchangeRates("2023-01-29", null, ["Usd,EUR,AUD,BGN"]);
        $models = [];
        foreach ($exchangeRates as $exchangeRate) {
            foreach ($exchangeRate->rates() as $rate) {
                $currencies[$rate->currency->name][] = $rate->value;
                $model = new Moddel();
                $model->date = $exchangeRate->getDateString();
                $model->currency = $rate->currency->name;
                $model->value = $rate->value;

                $models[] = $model;
            }
        }

        return $models;
    }
}
