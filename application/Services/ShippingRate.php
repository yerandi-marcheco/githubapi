<?php
namespace Services;

use DataProviders\PrintfulShippingRate;
use Store\CacheInterface;

class ShippingRate
{
    /**
     * @var CacheInterface
    */
    private $cache;

    /**
     * @var PrintfulShippingRate
    */
    private $shippingRate;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
        $this->shippingRate = new PrintfulShippingRate();
    }

    public function storeShippingRate($recipient, $items)
    {
        return $this->cache->set('shipping-rates', $this->shippingRate->calculateShippingRates($recipient, $items), 300);
    }
}
