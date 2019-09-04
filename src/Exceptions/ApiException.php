<?php

namespace Paymongo\Exceptions;

class ApiException extends Exception
{
    public $jsonBody;

    public function __construct($jsonBody)
    {
        $this->jsonBody = $jsonBody;
    }

    public function errors($attribute='')
    {
        if (!empty($this->jsonBody)) {
            if (!empty($attribute)) {
                $errors = $this->errors();
                
                return array_filter($errors, function ($error) use ($attribute) {
                    return ($error->hasSource() && $error->source->attribute == $attribute);
                });
            } else {
                $errors = json_decode($this->jsonBody, true)['errors'];
                
                return array_map(function ($error) {
                    return new Error($error);
                }, $errors);
            }
        }

        return [];
    }

    public static function factory($message, $jsonBody)
    {
        $message .= ' ' . self::digestApiError($jsonBody);
        $instance = new static($message);
        $instance->jsonBody = $jsonBody;
        
        return $instance;
    }
    
    public static function digestApiError($jsonBody)
    {
        $body = json_decode($jsonBody, true);
        $apiErrorMessage = '';

        foreach ($body['errors'] as $error) {
            $apiErrorMessage .= $error['meta']['type'] . ': ' . $error['code'] . ' - ' . $error['detail'];
        }
        
        return $apiErrorMessage;
    }
}
