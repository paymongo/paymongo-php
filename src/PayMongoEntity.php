<?php

namespace PayMongo;

class PayMongoEntity
{
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
