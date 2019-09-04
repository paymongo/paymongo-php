<?php

namespace Paymongo;

class ApiResource
{
    public $data;
    public $attributes;
    public $id;
    public $hasMore;

    public function __construct($response)
    {
        $this->data = array_key_exists('data', $response) ? $response['data'] : $response;

        if(array_key_exists('attributes', $this->data)) {
            $this->attributes = $this->data['attributes'];
            $this->id = $this->data['id'];
        }

        $this->hasMore = array_key_exists('has_more', $response) ? $response['has_more'] : null;
    }
}