<?php

use PayMongo\Exceptions\PublicKeyException;
use PayMongo\PayMongo;
use PHPUnit\Framework\TestCase;

final class PayMongoTest extends TestCase
{
    public function testCanSetPayMongoApiKey(): void
    {
        PayMongo::setApiKey('sk_test_asdfasdfasdf');
        
        $this->assertEquals(
            'sk_test_asdfasdfasdf',
            PayMongo::$apiKey
        );
    }

    public function testThrowsPublicKeyException(): void
    {
        $this->expectException(PublicKeyException::class);
        
        PayMongo::setApiKey('pk_asdfasdfasdf');
    }
}
