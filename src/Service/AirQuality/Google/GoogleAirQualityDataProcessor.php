<?php

namespace App\Service\AirQuality\Google;

use Symfony\Component\VarDumper\VarDumper;

class GoogleAirQualityDataProcessor
{
    public function processData(array $googleAirQualityArray) : array
    {
        $processedArray = [];

        VarDumper::dump($googleAirQualityArray);

        return $processedArray;

    }
}