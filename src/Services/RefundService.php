<?php

namespace Paymongo\Services;

class RefundService extends BaseService {
    const URI = '/refunds';

    public function all($params = []) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        $responseData = $apiResponse->data;
        $objects = [];

        foreach ($responseData as $row) {
            $rowApiResource = new \Paymongo\ApiResource($row);
            $objects[] = new \Paymongo\Entities\Refund($rowApiResource);
        }

        return new \Paymongo\Entities\Listing([
            'has_more' => $apiResponse->has_more,
            'data'     => $objects,
        ]);
    }

    public function retrieve($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\Refund($apiResource);
    }

    public function create($params) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Refund($apiResource);
    }
}