<?php
namespace test;

use DataProviders\PrintfulShippingRate;
use Store\Cache;

class ShippingRateTest extends \PHPUnit\Framework\TestCase
{
    public function testCalculateShippingRateResponse()
    {
        $recipient = [
            'address1' => '11025 Westlake Dr',
            'city' => 'Charlotte',
            'country_code' =>  'US',
            'zip' => '28273'
        ];
        $items = [
            [
                'variant_id' => 7679,
                'quantity' => 2
            ]
        ];

        $printfulShippingRate = new PrintfulShippingRate();
        $result = $printfulShippingRate->calculateShippingRates($recipient, $items);
        $result = json_decode($result);
        $this->assertEquals(200, $result->code);
    }

    public function testStoreShippingRateInCache()
    {
        $cache = new Cache();
        $result = $cache->set('key-test', 'Lorem', 500);
        $this->assertTrue($result);
    }
}
