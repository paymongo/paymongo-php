<?php

namespace Paymongo\Exception;

class ApiException extends \Exception {
    
    public static $jsonBody;

    public function factory($message, $jsonBody) {
        $message .= ' ' . self::digestApiError($jsonBody);
        $instance = new static($message);
        $instance->jsonBody = $jsonBody;
        return $instance;
    }
    
    public function digestApiError($jsonBody)
    {
        $body = json_decode($jsonBody, true);
        $apiErrorMessage = '';
        foreach($body['errors'] as $error) {
          $apiErrorMessage .= $error['meta']['type'] . ': ' . $error['code'] . ' - ' . $error['detail']; 
        }
        return $apiErrorMessage;
    }
}