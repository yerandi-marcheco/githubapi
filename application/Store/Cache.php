<?php
namespace Store;

class Cache implements CacheInterface
{
    /**
     * @return boolean
    */
    public function set(string $key, $value, int $duration)
    {
        return apc_store($key, $value, $duration);
    }

    public function get(string $key)
    {
        return json_decode(apc_fetch($key));
    }
}
