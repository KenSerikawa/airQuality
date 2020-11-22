<?php

namespace App\AirQuality\Application;

use Symfony\Component\HttpClient\HttpClient;

final class AirQualityFinder {
    
    public function __invoke(string $city)
    {
        $client = HttpClient::create();

        $url = "https://api.waqi.info/feed/" . $city . "/?token=f97650a3d94724f1ff358b1d74ea439ade569714";
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];

        return $response->getContent();
    }
}
