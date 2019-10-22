<?php

namespace Paymongo\Object;

use \Paymongo\HttpClient;
use \Paymongo\Paymongo;

trait Create {
    
    public function create(array $params) {
        $result = HttpClient::request('POST', Paymongo::getApiUrl() . static::PATH, '', $params);
        return (object) $result['data'];
    }
}