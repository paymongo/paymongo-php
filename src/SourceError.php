<?php

namespace Paymongo;

class SourceError
{
    public $pointer;
    public $attribute;

    public function __construct($source)
    {
        $this->pointer = $source['pointer'];
        $this->attribute = $source['attribute'];
    }
}