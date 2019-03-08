<?php
namespace App\Cache;

use App\Cache\PlaceToPayCache;
use Psr\Cache\CacheItemInterface;


class BankListCache implements CacheItemInterface{

    private $key = "bank-list";
    private $value;

    public function getKey()
    {
        return $this->key;
    }

    public function setValue($value)
    {
        $this->value = serialize($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function get()
    {
        return (new PlaceToPayCache())->getItem($this->getKey());
    }

    public function isHit()
    {
        return (new PlaceToPayCache())->hasItem($this->getKey());
    }

    public function set($value)
    {
        $this->setValue($value);
        (new PlaceToPayCache())->save($this);
    }

    public function expiresAt($expiration)
    {

    }

    public function expiresAfter($time){}
}