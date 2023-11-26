<?php

namespace App\Service\AirQuality\Google;

class GoogleAirQualityDataProcessor
{
    public function processData(array $googleAirQualityArray): array
    {
        $processedArray = [];
        foreach ($googleAirQualityArray as $day) {
            $dateObject = new \DateTime($day[0]->dateTime);
            $formattedDate = $dateObject->format('d-m-Y');

            $aqis = $this->calculateAverage($day, 'aqi');
            $red = $this->calculateAverageColor($day, 'red');
            $green = $this->calculateAverageColor($day, 'green');
            $blue = $this->calculateAverageColor($day, 'blue');

            $processedArray[$formattedDate] = [
                'iqa' => $aqis,
                'red' => $red*255,
                'green' => $green*255,
                'blue' => $blue*255
            ];
        }
        return $processedArray;
    }

    private function calculateAverage(array $data, $key): float
    {
        $sum = 0;
        $count = 0;
        foreach ($data as $item) {
            if (isset($item->indexes[0]->$key)) {
                $sum += $item->indexes[0]->$key;
                ++$count;
            }
        }
        return $count > 0 ? $sum / $count : 0;
    }

    private function calculateAverageColor(array $data, $color): float
    {
        $colorData = ['sum' => 0, 'count' => 0];
        foreach ($data as $item) {
            if (isset($item->indexes[0]->color->$color)) {
                $colorData['sum'] += $item->indexes[0]->color->$color;
                ++$colorData['count'];
            }
        }
        return $colorData['count'] > 0 ? $colorData['sum'] / $colorData['count'] : 0;
    }
}