<?php

namespace Paymongo\Services;

class PaymentService extends BaseService {
    const URI = '/payments';

    public function all($params = []) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        $responseData = $apiResource->data;
        $objects = [];

        foreach ($responseData as $row) {
            $apiResource = new \Paymongo\ApiResource($row);
            $objects[] = new \Paymongo\Entities\Payment($apiResource);
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

        return new \Paymongo\Entities\Payment($apiResource);
    }

    public function create($params) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Payment($apiResource);
    }
}