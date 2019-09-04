<?php

namespace Paymongo\Entities;

class PaymentMethod extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->type = $attributes['type'];
        $this->billing = is_null($attributes['billing']) ? null : new \Paymongo\Entities\Billing($attributes['billing']);
        $this->details = $attributes['details'];
        $this->metadata = empty($attributes['metadata']) ? null : $attributes['metadata'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}