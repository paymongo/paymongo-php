<?php

namespace PayMongo\ApiMethods;

use \PayMongo\HttpClient;
use \PayMongo\PayMongo;

trait Create
{
    public static function create(array $params)
    {
        $result = HttpClient::request('POST', PayMongo::getApiUrl() . static::PATH, '', $params);
        return new SELF($result['data']);
    }
}
