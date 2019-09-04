<?php

namespace Paymongo\Entities;

class Payment extends BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->amount = $attributes['amount'];
        $this->billing = is_null($attributes['billing']) ? null : new \Paymongo\Entities\Billing($attributes['billing']);
        $this->currency = $attributes['currency'];
        $this->description = $attributes['description'];
        $this->fee = $attributes['fee'];
        $this->livemode = $attributes['livemode'];
        $this->net_amount = $attributes['net_amount'];
        $this->statement_descriptor = $attributes['statement_descriptor'];
        $this->status = $attributes['status'];
        $this->available_at = $attributes['available_at'];
        $this->created_at = $attributes['created_at'];
        $this->paid_at = $attributes['paid_at'];
        $this->payout = $attributes['payout'];
        $this->updated_at = $attributes['updated_at'];
        $this->metadata = $attributes['metadata'];
        $this->source = $attributes['source'];
        $this->tax_amount = $attributes['tax_amount'];
        $this->payment_intent_id = $attributes['payment_intent_id'];
        $this->refunds = [];

        if(is_array($attributes['refunds']) && !empty($attributes['refunds'])) {
            $refunds = $attributes['refunds'];

            foreach($refunds as $refund) {
                $rowApiResource = new \Paymongo\ApiResource($refund);
                $this->refunds[] = new \Paymongo\Entities\Refund($rowApiResource);
            }
        }

        $this->taxes = $attributes['taxes'];
    }
}