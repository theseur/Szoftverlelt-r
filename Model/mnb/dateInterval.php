<?php
require_once './mnb/util.php';
class SupportedDateInterval
{

    private DateTime $startDate;
    private DateTime $endDate;

    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = convertToDate($startDate);
        $this->endDate = convertToDate($endDate);
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
        return convertDateToSting($this->getStartDate());
    }

    public function getEndDateString(): string
    {
        return convertDateToSting($this->getEndDate());
    }
}
