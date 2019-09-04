<?php

namespace Paymongo\Services;

class PaymentIntentService extends \Paymongo\Services\BaseService {
    const URI = '/payment_intents';

    public function create($params) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\PaymentIntent($apiResource);
    }

    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\PaymentIntent($apiResource);
    }

    public function capture($id, $params) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}/capture",
            'params' => $params
        ]);

        return new \Paymongo\Entities\PaymentIntent($apiResource);
    }

    public function cancel($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}/cancel",
        ]);

        return new \Paymongo\Entities\PaymentIntent($apiResource);
    }
}