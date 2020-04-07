<?php

namespace PayMongo\ApiMethods;

use \PayMongo\HttpClient;
use \PayMongo\PayMongo;

trait Index
{
    public static function index()
    {
        $result = HttpClient::request('GET', PayMongo::getApiUrl() . static::PATH, '', '');
        
        $collection = [];
        foreach ($result['data'] as $record) {
            $collection[] = (object) $record;
        }

        return $collection;
    }
}
