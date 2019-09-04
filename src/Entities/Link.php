<?php

namespace Paymongo\Entities;

class Link extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->amount = $attributes['amount'];
        $this->archived = $attributes['archived'];
        $this->currency = $attributes['currency'];
        $this->description = $attributes['description'];
        $this->livemode = $attributes['livemode'];
        $this->fee = $attributes['fee'];
        $this->remarks = $attributes['remarks'];
        $this->status = $attributes['status'];
        $this->tax_amount = $attributes['tax_amount'];
        $this->checkout_url = $attributes['checkout_url'];
        $this->reference_number = $attributes['reference_number'];
        if(!empty($attributes['payments'])) {
            $this->payments = [];

            foreach($attributes['payments'] as $payment) {
                $this->payments[] = new \Paymongo\Entities\Payment($payment);
            }
        }
        $this->taxes = $attributes['taxes'];
        $this->metadata = empty($attributes['metadata']) ? null : $attributes['metadata'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}