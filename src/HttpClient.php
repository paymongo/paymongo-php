<?php

namespace Paymongo;

class HttpClient
{
    const DEFAULT_CONNECTTIMEOUT = 30;
    const DEFAULT_TIMEOUT = 30;

    public function __construct($apiKey = '')
    {
        $this->apiKey = $apiKey;
    }

    public function request($opts)
    {        
        $url = $opts['url'];

        if (isset($opts['params']) && $opts['method'] === 'GET') {
            $url .= '?' . http_build_query($opts['params']);
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::DEFAULT_CONNECTTIMEOUT);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::DEFAULT_TIMEOUT);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type:application/json',
                'Authorization: Basic '. base64_encode($this->apiKey . ':'),
            ]
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if (in_array($opts['method'], ['DELETE', 'POST', 'PUT'])) {

            if (isset($opts['params'])) {
                $data = [
                    'data' => [
                        'attributes' => $opts['params']
                    ]
                ];
                $dataString = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            }
            
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $opts['method']);
            curl_setopt($ch, CURLOPT_POST, 1);
        }

        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $url = curl_getinfo($ch,  CURLINFO_EFFECTIVE_URL);

        if ($code < 200 || $code >= 400) {
            $this->handleErrorResponse($body, $code, $url);
        }

        curl_close($ch);
        
        $jsonBody = json_decode($body, true);

        return new \Paymongo\ApiResource($jsonBody);
    }

    private function handleErrorResponse($body, $code, $url)
    {
        $jsonBody = json_decode($body, true);

        switch ($code) {
            case '401':
                $exception = new \Paymongo\Exceptions\AuthenticationException($jsonBody);

                break;
            case '400':
                $exception = new \Paymongo\Exceptions\InvalidRequestException($jsonBody);

                break;
            case '404':
                if(!empty($body)) {
                    $exception = new \Paymongo\Exceptions\ResourceNotFoundException($jsonBody);
                } else {
                    $exception = new \Paymongo\Exceptions\RouteNotFoundException("Route {$url} not found.");
                }

                break;
            default:
                $exception = new \Paymongo\Exceptions\BaseException($jsonBody);

                break;
        }

        throw $exception;
    }
}
