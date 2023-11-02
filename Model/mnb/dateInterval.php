<?php
class SupportedDateInterval
{

    private string $format_type = 'Y-m-d';
    private DateTime $startDate;
    private DateTime $endDate;


    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = $this->convertToDate($startDate);
        $this->endDate = $this->convertToDate($endDate);
    }

    private function convertToDate(string $stringDate): DateTime
    {
        return DateTime::createFromFormat($this->format_type, $stringDate);
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    public function getStartDateString(): string
    {
        return $this->getStartDate()->format($this->format_type);
    }

    public function getEndDateString(): string
    {
        return $this->getEndDate()->format($this->format_type);
    }
}
