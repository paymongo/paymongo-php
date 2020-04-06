<?php

namespace Paymongo\ApiMethods;

use \Paymongo\HttpClient;
use \Paymongo\Paymongo;

trait Index
{
    public static function index()
    {
        $result = HttpClient::request('GET', Paymongo::getApiUrl() . static::PATH, '', '');
        $collection = [];
        foreach ($result['data'] as $record) {
            $collection[] = (object) $record;
        }
        return $collection;
    }
}
