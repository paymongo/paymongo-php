<?php

namespace Paymongo\Services;

class WebhookService extends \Paymongo\Services\BaseService {
    const URI = '/webhooks';

    public function create($params) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
            'params' => $params
        ]);

        return new \Paymongo\Entities\Webhook($apiResource);
    }

    public function update($id, $params) {
        $apiResource = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Paymongo\Entities\Webhook($apiResource);
    }

    public function retrieve($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}",
        ]);

        return new \Paymongo\Entities\Webhook($apiResource);
    }

    public function all() {
        $apiResource = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI,
        ]);

        $objects = [];

        foreach ($apiResource->data as $row) {
            $rowResource = new \Paymongo\ApiResource($row);
            $objects[] = new \Paymongo\Entities\Webhook($rowResource);
        }

        return new \Paymongo\Entities\Listing([
            'has_more' => $apiResource->hasMore,
            'data'     => $objects,
        ]);
    }

    public function enable($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}" . '/enable',
        ]);

        return new \Paymongo\Entities\Webhook($apiResource);
    }

    public function disable($id) {
        $apiResource = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}/{$this->client->apiVersion}/" . self::URI . "/{$id}" . '/disable',
        ]);

        return new \Paymongo\Entities\Webhook($apiResource);
    }

    public function constructEvent($opts) {
        $payload = $opts['payload'];
        $signatureHeader = $opts['signature_header'];
        $webhookSecretKey = $opts['webhook_secret_key'];

        if (!is_string($signatureHeader)) {
            throw \Paymongo\Exceptions\UnexpectedValueException('Signature must be a string.');
        }

        $arrSignature = explode(',', $signatureHeader);

        if ($arrSignature === false || count($arrSignature) < 3) {
            throw new \Paymongo\Exceptions\UnexpectedValueException("The format of signature {$signature} is invalid.");
        }

        $timestamp = explode('=', $arrSignature[0])[1];
        $testModeSignature = explode('=', $arrSignature[1])[1];
        $liveModeSignature = explode('=', $arrSignature[2])[1];

        if (!empty($testModeSignature)) {
            $comparisonSignature = $testModeSignature;
        }

        if (!empty($liveModeSignature)) {
            $comparisonSignature = $liveModeSignature;
        }

        if (hash_hmac('sha256', $timestamp . '.' . $payload, $webhookSecretKey) != $comparisonSignature) {
            throw new \Paymongo\Exceptions\SignatureVerificationException("The signature is invalid.");
        }

        $jsonDecodedBody = json_decode($payload, true);

        $apiResource = new \Paymongo\ApiResource($jsonDecodedBody);

        return new \Paymongo\Entities\Event($apiResource);
    }
}