<?php

namespace Paymongo\Entities;

class Source extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->type = $attributes['type'];
        $this->amount = $attributes['amount'];
        $this->currency = $attributes['currency'];
        $this->description = $attributes['description'];
        $this->livemode = $attributes['livemode'];
        $this->status = $attributes['status'];
        $this->redirect = $attributes['redirect'];
        $this->billing = is_null($attributes['billing']) ? null : new \Paymongo\Entities\Billing($attributes['billing']);
        $this->metadata = $attributes['metadata'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}