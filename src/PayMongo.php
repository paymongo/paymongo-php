<?php
 
namespace PayMongo;

use PayMongo\Exceptions\PublicKeyException;

/**
 * Class PayMongo
 *
 * @package PayMongo
 */
class PayMongo
{
 
    // @var string PayMongo secret key used for authenticating and performing payment transactions
    public static $apiKey;
 
    // @var string PayMongo API Base Url
    public static $apiBaseUrl = 'https://api.paymongo.com/';
 
    public static $apiVersion = 'v1';
 
    /**
     * Sets the secret API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        if (strtolower(substr($apiKey, 0, 2)) === 'pk') {
            throw new PublicKeyException;
        }
        self::$apiKey = $apiKey;
    }

    public static function getApiUrl()
    {
        return self::$apiBaseUrl . self::$apiVersion . '/';
    }
}
