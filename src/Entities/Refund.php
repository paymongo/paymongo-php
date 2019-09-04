<?php

namespace Paymongo\Entities;

class Refund extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->amount = $attributes['amount'];
        $this->balance_transaction_id = $attributes['balance_transaction_id'];
        $this->livemode = $attributes['livemode'];
        $this->payment_id = $attributes['payment_id'];
        $this->payout_id = $attributes['payout_id'];
        $this->notes = $attributes['notes'];
        $this->reason = $attributes['reason'];
        $this->status = $attributes['status'];
        $this->available_at = $attributes['available_at'];
        $this->refunded_at = $attributes['refunded_at'];
        $this->currency = $attributes['currency'];
        $this->metadata = empty($attributes['metadata']) ? null : $attributes['metadata'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}