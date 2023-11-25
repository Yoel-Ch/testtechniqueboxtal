<?php

use App\Core\Router\Router;
use App\Model\AirQuality\AirQuality;

$root = dirname($_SERVER['DOCUMENT_ROOT']);
require_once $root.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable($root);
$dotenv->load();
$router = new Router();
$router->start();

