<?php

namespace Paymongo\Services;

class SourceService extends \Paymongo\Services\BaseService {
    const URI = '/sources';

    public function create($params) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Source($apiResource);
    }

    public function retrieve($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\Source($apiResource);
    }
}