<?php
namespace App\Cache;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\CacheItemInterface;
use Illuminate\Support\Facades\Cache;

class PlaceToPayCache implements CacheItemPoolInterface{

    public function getItem($key)
    {
        return Cache::get($key);
    }

    public function getItems(array $keys = array())
    {
        $Items = array();
        foreach($keys as $key)
        {
            $item = $this->getItem($key);
            if(isset($item))
            {
                $Items[] = $item;
            }
        }

        return $Items;
    }

    public function hasItem($key)
    {
        if (Cache::has($key)) {
            return true;
        }
        return false;
    }

    public function clear()
    {
        Cache::flush();
    }

    public function deleteItem($key)
    {
        Cache::pull($key);
    }

    public function deleteItems(array $keys)
    {
        foreach($keys as $key)
        {
            $this->deleteItem($key);
        }
    }

    public function save(CacheItemInterface $item)
    {
        Cache::add($item->getKey(), $item->getValue(), 1440);
    }

    public function saveDeferred(CacheItemInterface $item)
    {

    }

    public function commit(){}
}