<?php

namespace Paymongo\Services;

class CustomerService extends BaseService {
    const URI = '/customers';

    public function retrieve($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\Customer($apiResource);
    }

    public function create($params) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Customer($apiResource);
    }

    public function update($id, $params) {
        $apiResource = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Paymongo\Entities\Customer($apiResource);
    }
    
    public function delete($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'DELETE',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}"
        ]);

        return new \Paymongo\Entities\Customer($apiResource);
    }
}