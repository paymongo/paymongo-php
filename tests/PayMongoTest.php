<?php
use PHPUnit\Framework\TestCase;
use PayMongo\PayMongo;
use PayMongo\Exceptions\PublicKeyException;

final class PayMongoTest extends TestCase
{
    public function testCanSetPayMongoApiKey(): void
    {
        PayMongo::setApiKey('sk_test_asdfasdfasdf');
        
        $this->assertEquals(
            'sk_test_asdfasdfasdf',
            PayMongo::$secretKey
        );
    }

    public function testThrowsPublicKeyException(): void
    {
        $this->expectException(PublicKeyException::class);
        
        PayMongo::setApiKey('pk_asdfasdfasdf');
    }
}
