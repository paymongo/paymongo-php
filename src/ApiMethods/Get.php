<?php

namespace Paymongo\ApiMethods;

use \Paymongo\HttpClient;
use \Paymongo\Paymongo;

trait Get {
    
    public function get($id)
    {
        $result = HttpClient::request('GET', Paymongo::getApiUrl() . static::PATH . '/' . urlencode($id) , '', '');
        return (object) $result['data'];
    }
}