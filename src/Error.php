<?php

namespace Paymongo;

class Error
{
    public $code;
    public $detail;
    public $source;
    private $error;

    public function __construct($error)
    {
        $this->error = $error;
        $this->code = array_key_exists('code', $error) ? $error['code'] : null;
        $this->detail = $error['detail'];
        $this->source = null;

        if ($this->hasSource()) {
            $this->source = new \Paymongo\SourceError($error['source']);
        }
    }

    private function hasSource()
    {
        return array_key_exists('source', $this->error);
    }
}