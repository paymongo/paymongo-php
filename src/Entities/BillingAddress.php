<?php

namespace Paymongo\Entities;

class BillingAddress
{
    public function __construct($data)
    {
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->line1 = $data['line1'];
        $this->line2 = $data['line2'];
        $this->postal_code = $data['postal_code'];
        $this->state = $data['state'];
    }
}
