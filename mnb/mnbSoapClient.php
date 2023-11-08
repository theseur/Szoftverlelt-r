<?php
require_once 'model/mnb/currency.php';
require_once 'model/mnb/exchange.php';
require_once 'model/mnb/dateInterval.php';
require_once 'model/mnb/day.php';


class MNBSoapClient
{
    private $client;

    public function __construct()
    {
        $this->initClient();
    }

    private function initClient(): void
    {
        $params = array(
            'soap_version'   => SOAP_1_2
        );
        try {
            $this->client = new SoapClient(MNB_URL, $params);
        } catch (SoapFault $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getInterval(): SupportedDateInterval
    {
        $dateIntervalResult = $this->client->GetDateInterval();
        $element = $this->createSimpleXMLElement($dateIntervalResult->GetDateIntervalResult);

        return new SupportedDateInterval(
            (string) $element->DateInterval['startdate'],
            (string) $element->DateInterval['enddate']
        );
    }

    public function getCurrencies(): array
    {
        $currenciesResult = $this->client->GetCurrencies();
        $element = $this->createSimpleXMLElement($currenciesResult->GetCurrenciesResult);

        $currencies = [];
        foreach ($element->Currencies->Curr as $c) {
            $currencies[] = new Currency((string)$c);
        }
        return $currencies;
    }


    public function getCurrentExchangeRates(): EchangeRate
    {
        $currentExchangeResult = $this->client->GetCurrentExchangeRates();
        return EchangeRate::createCurrentExchange(
            $this->createSimpleXMLElement($currentExchangeResult->GetCurrentExchangeRatesResult)
        );
    }

    public function getExchangeRates(?string $fromDate, ?string $toDate, array $currencyNames): array
    {
        if ($fromDate !== null && strtotime($fromDate) === false) {
            $fromDate = date('Y-m-d', strtotime('-1 month'));
        }

        if ($toDate !== null && strtotime($toDate) === false) {
            $toDate = date('Y-m-d');
        }

        $params = [
            'startDate' => $fromDate,
            'endDate' => $toDate,
            'currencyNames' => implode(',', array_map('strtoupper', $currencyNames))
        ];

        $exchangeRatesResult = $this->client->GetExchangeRates($params);
        $element = $this->createSimpleXMLElement($exchangeRatesResult->GetExchangeRatesResult);

        $rates = [];
        foreach ($element as $rate) {
            $rates[] = EchangeRate::createExchange($rate);
        }
        return $rates;
    }


    private function createSimpleXMLElement(string $xmlContent): SimpleXMLElement
    {
        return new SimpleXMLElement(html_entity_decode($xmlContent));
    }
}
