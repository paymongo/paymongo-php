<?php

namespace Paymongo\Exceptions;

class ResourceNotFoundException extends \Paymongo\Exceptions\BaseException
{
    public function getError()
    {
        return new \Paymongo\Error($this->errors[0]);
    }
}