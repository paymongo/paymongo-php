<?php

namespace Paymongo\Entities;

class Event extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->resource = $attributes['data'];
        $this->type = $attributes['type'];
    }
}