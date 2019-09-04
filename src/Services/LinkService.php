<?php

namespace Paymongo\Services;

class LinkService extends BaseService {
    const URI = '/links';

    public function all($params = []) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        $responseData = $apiResponse->data;
        $objects = [];

        foreach ($responseData as $row) {
            $rowApiResource = new \Paymongo\ApiResource($row);
            $objects[] = new \Paymongo\Entities\Link($rowApiResource);
        }

        return new \Paymongo\Entities\Listing([
            'has_more' => $apiResponse->has_more,
            'data'     => $objects,
        ]);
    }

    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\Link($apiResource);
    }

    public function create($params) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Link($apiResource);
    }

    public function archive($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}" . '/archive',
        ]);

        return new \Paymongo\Entities\Link($apiResource);
    }
    
    public function unarchive($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}" . '/unarchive',
        ]);

        return new \Paymongo\Entities\Link($apiResource);
    }
}