<?php

namespace App\Service\AirQuality\Google;

use App\Interface\AirQuality\AirQualityGetterInterface;
use App\Service\ApiRequester\ApiRequester;

class GoogleAirQualityFetcher implements AirQualityGetterInterface
{
    private $apiRequester;
    private $googleUrl;

    public function __construct(ApiRequester $apiRequester)
    {
        $this->apiRequester = $apiRequester;
        $this->googleUrl = "https://airquality.googleapis.com/v1/history:lookup?key=" . $_ENV['GOOGLE_AIR_QUALITY_API_KEY'];

    }

    public function getAirQualityData(float $latitude, float $longitude): array {
        $endTime = new \DateTime('yesterday');
        $endTime->setTime(23, 59, 59);
        $numberOfDaysToFetch = 28;
        $startTime = (new \DateTime('yesterday'))->modify('-'.$numberOfDaysToFetch.' days');
        $startTime->setTime(0, 0, 0);

        $airQualityData = [];
        $nextPageToken = null;
        $hoursPerPage = 24; // each page array will be equal to a day.

        do {
            $options = [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => [
                    'pageSize' => $hoursPerPage,
                    'location' => ['latitude' => $latitude, 'longitude' => $longitude],
                    'period' => [
                        'startTime' => $startTime->format(DATE_ATOM),
                        'endTime' => $endTime->format(DATE_ATOM)
                    ],
                    'pageToken' => $nextPageToken
                ]
            ];

            $responseDecoded = $this->apiRequester->postRequest($this->googleUrl, $options);
            $airQualityData[] = $responseDecoded->hoursInfo;
            $nextPageToken = $responseDecoded->nextPageToken ?? null;

        } while ($nextPageToken);

        return $airQualityData;
    }
}