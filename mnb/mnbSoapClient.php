<?php
require_once 'model/mnb/currency.php';
require_once 'model/mnb/dateInterval.php';
require_once 'model/mnb/day.php';
require_once 'model/mnb/rate.php';


class MNBSoapClient
{
    private $client;

    public function __construct()
    {
        $params = array(
            'soap_version'   => SOAP_1_2
        );
        $this->client = new SoapClient(MNB_URL, $params);
    }


    public function getInterval(): SupportedDateInterval
    {
        $result = $this->client->GetDateInterval();
        $xmlContent = html_entity_decode($result->GetDateIntervalResult);

        $response = new SimpleXMLElement($xmlContent);

        return new SupportedDateInterval(
            (string) $response->DateInterval['startdate'],
            (string) $response->DateInterval['enddate']
        );
    }

    public function getCurrencies(): array
    {
        $result = $this->client->GetCurrencies();
        $resultXml = $result->GetCurrenciesResult;

        $xmlContent = html_entity_decode($resultXml);
        $response = new SimpleXMLElement($xmlContent);

        $currencies = [];
        foreach ($response->Currencies->Curr as $c) {
            $currency = new Currency();
            $currency->name = (string)$c;

            array_push($currencies, $currency);
        }
        return $currencies;
    }
}
