<?php

namespace Paymongo\Object;

use \Paymongo\HttpClient;
use \Paymongo\Paymongo;

trait Index {
    
    public function list()
    {
        $result = HttpClient::request('GET', Paymongo::getApiUrl() . static::PATH, '', '');
        $collection = [];
        foreach($result['data'] as $record) {
            $collection[] = (object) $record;
        }
        return $collection;
    }
}