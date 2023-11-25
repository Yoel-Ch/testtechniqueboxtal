<?php

namespace App\Interface\AirQuality;

interface AirQualityGetterInterface
{
    public function getAirQualityData(float $latitude, float $longitude): array;
}