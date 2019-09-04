<?php 

namespace Paymongo\Entities;

class Listing
{
    public function __construct($data)
    {
        $this->has_more = in_array($data['has_more'], [true, 1]) === true ? true : false;
        $this->data = $data['data'];
    }
}