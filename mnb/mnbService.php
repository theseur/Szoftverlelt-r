<?php
require_once 'mnb/mnbSoapClient.php';

class MNBService
{
    private MNBSoapClient $soapClient;

    public function __construct()
    {
        $this->soapClient = new MNBSoapClient();
    }

    public function getExchangeData($startDate, $endDate, $selectedCurrencies)
    {
        $exchangeRates = $this->soapClient->getExchangeRates($startDate, $endDate, $selectedCurrencies);
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

        //növekvő sorrendbe rendezi az adatokat
        usort($models, function ($a, $b) {
            return strtotime($a->date) - strtotime($b->date);
        });

        return $models;
    }

    public function getCurrencies()
    {
        return $this->soapClient->getCurrencies();
    }
}
