<?php
 
namespace Paymongo;
 
/**
 * Class Paymongo
 * 
 * @package Paymongo
 */
class Paymongo {
 
    // @var string Paymongo secret key used for authenticating and performing payment transactions
    public static $secretKey;
 
    // @var string Paymongo API Base Url
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

    public function getApiUrl()
    {
        return self::$apiBaseUrl . self::$apiVersion . '/';
    }
}
