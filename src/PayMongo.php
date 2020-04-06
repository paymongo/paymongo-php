<?php
 
namespace PayMongo;

/**
 * Class PayMongo
 *
 * @package PayMongo
 */
class PayMongo
{
 
    // @var string PayMongo secret key used for authenticating and performing payment transactions
    public static $secretKey;
 
    // @var string PayMongo API Base Url
    public static $apiBaseUrl = 'https://api.paymongo.com/';
 
    public static $apiVersion = 'v1';
 
    /**
     * Sets the secret API key to be used for requests.
     *
     * @param string $secretKey
     */
    public static function setApiKey($secretKey)
    {
        self::$secretKey = $secretKey;
    }

    public static function getApiUrl()
    {
        return self::$apiBaseUrl . self::$apiVersion . '/';
    }
}
