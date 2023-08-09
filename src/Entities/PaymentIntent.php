<?php

namespace Paymongo\Entities;

class PaymentIntent extends \Paymongo\Entities\BaseEntity
{
    public function __construct($apiResource)
    {
        $attributes = $apiResource->attributes;

        $this->id = $apiResource->id;
        $this->amount = $attributes['amount'];
        $this->capture_type = $attributes['capture_type'];
        $this->client_key = $attributes['client_key'];
        $this->currency = $attributes['currency'];
        $this->description = $attributes['description'];
        $this->livemode = $attributes['livemode'];
        $this->last_payment_error = $attributes['last_payment_error'];
        $this->statement_descriptor = $attributes['statement_descriptor'];
        $this->status = $attributes['status'];
        $this->payment_method_allowed = $attributes['payment_method_allowed'];
        $this->payments = null;

        if(!empty($attributes['payments'])) {
            $this->payments = [];

            foreach($attributes['payments'] as $payment) {
                $this->payments[] = new \Paymongo\Entities\Payment($payment);
            }
        }

        $this->next_action = $attributes['next_action'];
        $this->payment_method_options = $attributes['payment_method_options'];
        $this->metadata = empty($attributes['metadata']) ? null : $attributes['metadata'];
        $this->setup_future_usage = $attributes['setup_future_usage'];
        $this->created_at = $attributes['created_at'];
        $this->updated_at = $attributes['updated_at'];
    }
}