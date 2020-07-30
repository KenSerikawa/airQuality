<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class AirQualityFinder {
    public function __invoke(string $city)
    {
        $client = HttpClient::create();
        $url = "https://api.waqi.info/feed/" . $city . "/?token=f97650a3d94724f1ff358b1d74ea439ade569714";
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'

        return $content;
    }
}
