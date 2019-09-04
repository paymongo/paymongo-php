<?php

namespace Paymongo\Entities;

class Webhook extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->livemode = $attributes['livemode'];
        $this->secret_key = $attributes['secret_key'];
        $this->events = $attributes['events'];
        $this->url = $attributes['url'];
        $this->status = $attributes['status'];
        $this->metadata = empty($attributes['metadata']) ? null : $attributes['metadata'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}