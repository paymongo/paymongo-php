<?php

namespace Paymongo;

class HttpClient {
    private static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function request($method, $url, $headers, $params)
    {
        $data = [
            'data' => [
                'attributes' => $params
            ]
        ];
        $data_string = json_encode($data);
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type:application/json',
                'Authorization: Basic '. base64_encode(Paymongo::$secretKey . ':'),
            )
        );
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        if($method == 'POST') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        }   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);     
        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($code < 200 || $code >= 300) {   
            self::handleErrorResponse($body, $code);
        }
        curl_close($ch);
        return json_decode($body, true);
    }

    public function handleErrorResponse($body, $code)
    {
        $exception = null;
        switch ($code) {
            case '401':
                $exception = Exception\AuthenticationException::factory("You provided an api key that doesn't exist, you can go to developer section on your dashboard to get valid API key. ", $body);
                break;
            default:
                $exception = Exception\ApiException::factory('', $body);
                break;
        }
        throw $exception;
    }
}