<?php

namespace Paymongo\Services;

class BaseService {
    public function __construct($client)
    {
        $this->client = $client;
        $this->httpClient = new \Paymongo\HttpClient($this->client->config['api_key']);
    }
}