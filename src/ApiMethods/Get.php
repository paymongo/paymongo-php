<?php

namespace PayMongo\ApiMethods;

use \PayMongo\HttpClient;
use \PayMongo\PayMongo;

trait Get
{
    public static function get($id)
    {
        $result = HttpClient::request('GET', PayMongo::getApiUrl() . static::PATH . '/' . urlencode($id), '', '');
        return (object) $result['data'];
    }
}
