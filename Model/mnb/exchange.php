<?php
class EchangeRate
{

    private ?DateTime $date;
    /**
     * @var Rate[]
     */
    private array $rates;

    public static function createCurrentExchange(SimpleXMLElement $response): EchangeRate
    {
        $e = new EchangeRate();
        $e->date = convertToDate($response->Day['date']);
        $e->rates = $e->convertToRateObject($response->Day->Rate);
        return $e;
    }

    public static function createExchange(SimpleXMLElement $response): EchangeRate
    {
        $e = new EchangeRate();
        $e->date = convertToDate((string) $response['date']);
        $e->rates = $e->convertToRateObject($response->Rate);
        return $e;
    }

    private function convertToRateObject(SimpleXMLElement $element): array
    {
        $results = [];
        foreach ($element as $rateData) {
            $results[] = new Rate($rateData);
        }
        return $results;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getDateString(): string
    {
        return convertDateToSting($this->date);
    }
    public function rates(): array
    {
        return $this->rates;
    }
}

class Rate
{
    public int $unit;
    public Currency $currency;
    public float $value;

    public function __construct(SimpleXMLElement $data)
    {
        $this->unit = (int)$data['unit'];
        $this->currency = new Currency((string)$data['curr']);
        $this->value = (float)str_replace(',', '.', (string)$data);
    }
}


class Moddel{

    public string $date;
    public string $currency;
    public string $value;

}