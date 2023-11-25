<?php

namespace App\Service\ApiRequester;

use GuzzleHttp\Client;

class ApiRequester
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function postRequest(string $url, array $options)
    {
        $response = $this->client->request('POST', $url, $options);
        return json_decode($response->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
    }
}