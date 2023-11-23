<?php

use App\Model\AirQuality\AirQuality;
use App\Service\Router\Router;

$root = dirname($_SERVER['DOCUMENT_ROOT']);
require_once $root.'/vendor/autoload.php';

$router = new Router();
$router->start();

