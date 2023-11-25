<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Service\AirQuality\Google\GoogleAirQualityFetcher;
use App\Service\ApiRequester\ApiRequester;
use App\Service\UrlTools\UrlParamConverter;
use Symfony\Component\VarDumper\VarDumper;

class HomeController extends BaseController
{
    public function show(?string $latitude = null, ?string $longitude = null)
    {
        $urlParamConverter = new UrlParamConverter();

        $latitude = $latitude !== null ? $urlParamConverter->floatConverter($latitude) : (float)$_ENV['LATITUDE_PARIS'];
        $longitude = $longitude !== null ? $urlParamConverter->floatConverter($longitude) : (float)$_ENV['LONGITUDE_PARIS'];
        $airQualityFetcher = new GoogleAirQualityFetcher(new ApiRequester());
        $airQualityData = $airQualityFetcher->getAirQualityData($latitude, $longitude);
        VarDumper::dump($airQualityData);
        $this->render('controller/home', ['titre' => 'Page d\'accueil']);
    }

    /*
     * date
     * moyenne iqa
     * couleur
     * */
}