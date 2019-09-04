<?php

namespace Paymongo\Entities;

class Billing
{
    public function __construct($data)
    {
        $this->address = new \Paymongo\Entities\BillingAddress($data['address']);
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
    }
}