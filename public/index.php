<?php

use App\Model\AirQuality\AirQuality;

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/vendor/autoload.php';
AirQuality::test();