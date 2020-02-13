<?php
namespace DataProviders;

use GuzzleHttp\Client;

class PrintfulShippingRate extends Api
{
    // I added as const to avoid include a config file. I would normally add it in a configuration file
    const BASE_URL = 'https://api.printful.com/shipping/​';
    const API_KEY = '77qn9aax-qrrm-idki:lnh0-fm2nhmp0yca7';
    const END_POINT = 'rates';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URL,
        ]);
        $this->base64ApiKey = base64_encode(self::API_KEY);
    }

    /**
     * @param array $recipient
     * @param array $items
     * @return mixed
    */
    public function calculateShippingRates($recipient, $items)
    {
        try {
            $response = $this->post(self::END_POINT, [
                'recipient' => $recipient,
                'items' => $items
            ]);

            return $response->getBody()->getContents();
        } catch (\ErrorException $errorException) {
            // Normally here should be handle the error, for the test reason I just print a message
            echo 'An unexpected error has occurred';
        }
    }
}
