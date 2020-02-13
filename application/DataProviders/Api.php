<?php
namespace DataProviders;

use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client;

class Api
{
    /**
     * @var GuzzleHttp\Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $base64ApiKey;

    public function post($endPoint, $body)
    {
        return $this->client->post($endPoint, [
            'headers' => [
                'Authorization' => "Basic $this->base64ApiKey"
            ],
            'json' => $body,
        ]);
    }
}
