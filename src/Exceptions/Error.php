<?php

namespace PayMongo\Exceptions;

class Error
{
    public $code;
    public $detail;
    public $errorSource;
    public $subCode;

    public function __construct($error)
    {
        $this->code = $error['code'];
        $this->detail = $error['detail'];
        $this->subCode = isset($error['subcode'])?$error['subcode']:'';
        $this->errorSource = isset($error['source'])?$error['source']:'';
        
        if ($this->hasSource()) {
            $this->{'source'} = $object = json_decode(json_encode($error['source']), false);
        } else {
            $this->{'source'} = null;
        }
    }

    public function hasSource()
    {
        return !empty($this->errorSource);
    }
}
