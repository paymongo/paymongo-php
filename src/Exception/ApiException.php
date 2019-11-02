<?php

namespace Paymongo\Exception;

class ApiException extends \Exception {
    
    public $jsonBody;

    public static function factory($message, $jsonBody) {
        $message .= ' ' . self::digestApiError($jsonBody);
        $instance = new static($message);
        $instance->jsonBody = $jsonBody;
        return $instance;
    }
    
    public static function digestApiError($jsonBody)
    {
        $body = json_decode($jsonBody, true);
        $apiErrorMessage = '';
        foreach($body['errors'] as $error) {
          $apiErrorMessage .= $error['meta']['type'] . ': ' . $error['code'] . ' - ' . $error['detail']; 
        }
        return $apiErrorMessage;
    }
}