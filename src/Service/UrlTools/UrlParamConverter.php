<?php

namespace App\Service\UrlTools;

use Symfony\Component\VarDumper\VarDumper;

class UrlParamConverter {

    public function floatConverter($stringToConvert)
    {
        $convertedString = str_replace('-', '.', $stringToConvert);

        $floatValue = (float)$convertedString;

        if ((string)$floatValue === $convertedString) {
            return $floatValue;
        } else {
            throw new InvalidArgumentException("Ce paramètre d'url est invalide : '{$stringToConvert}'");
        }

    }
}