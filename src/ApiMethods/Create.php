<?php

namespace Paymongo\ApiMethods;

use \Paymongo\HttpClient;
use \Paymongo\Paymongo;

trait Create {
    
    public static function create(array $params) {
        $result = HttpClient::request('POST', Paymongo::getApiUrl() . static::PATH, '', $params);
        return (object) $result['data'];
    }
}