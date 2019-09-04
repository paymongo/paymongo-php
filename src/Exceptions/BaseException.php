<?php

namespace Paymongo\Exceptions;

class BaseException extends \Exception
{
    private $data;
    protected $errors;
    
    public function __construct($data)
    {
        $this->data = $data;
        $this->errors = $this->data['errors'];
    }

    public function getError()
    {
        $errors = [];

        foreach($this->errors as $error) {
            $errors[] = new \Paymongo\Error($error);
        }

        return $errors;
    }
}
