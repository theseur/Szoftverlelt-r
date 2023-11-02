<?php

const FORMAT_TYPE = 'Y-m-d';

function convertToDate(?string $stringDate): DateTime
{
    if(empty($stringDate)){
        return null;
    }
    return DateTime::createFromFormat(FORMAT_TYPE, $stringDate);
}

function convertDateToSting(?DateTime $date): string
{
    if ($date === null) {
        return "";
    }
    return $date->format(FORMAT_TYPE);
}
