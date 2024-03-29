<?php

namespace App\Controller;

use App\Core\Controller\BaseController;
use App\Service\AirQuality\Google\GoogleAirQualityDataProcessor;
use App\Service\AirQuality\Google\GoogleAirQualityFetcher;
use App\Service\ApiRequester\ApiRequester;
use App\Service\UrlTools\UrlParamConverter;

class HomeController extends BaseController
{
    public function show(?string $latitude = null, ?string $longitude = null)
    {

        $urlParamConverter = new UrlParamConverter();

        $latitude = $latitude !== null ? $urlParamConverter->floatConverter($latitude) : (float)$_ENV['LATITUDE_PARIS'];
        $longitude = $longitude !== null ? $urlParamConverter->floatConverter($longitude) : (float)$_ENV['LONGITUDE_PARIS'];
        $airQualityFetcher = new GoogleAirQualityFetcher(new ApiRequester());
        $airQualityData = $airQualityFetcher->getAirQualityData($latitude, $longitude);
        $googleDataProcessor = new GoogleAirQualityDataProcessor();
        $processedAirQualityData=$googleDataProcessor->processData($airQualityData);


        $this->render('controller/home', [
            'title'=>'Page d\'accueil',
            'jsDirectory'=>str_replace('\\', '/',$_SERVER['DOCUMENT_ROOT']. "/js/"),
            'processedAirQualityData'=>$processedAirQualityData
        ]);
    }
}