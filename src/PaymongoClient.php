<?php
 
namespace Paymongo;

/**
 * Class Paymongo
 *
 * @package Paymongo
 */
class PaymongoClient
{
    /** @var string PayMongo API key used for authenticating and performing PayMongo API operations. */
    public $apiKey;
    /** @var string PayMongo API Base Url */
    public $apiBaseUrl = 'https://api.paymongo.com';
    /** @var string PayMongo API current API version  */
    public $apiVersion = 'v1';

    public function __construct($apiKey = '')
    {
        $this->config = [
            'api_key' => $apiKey
        ];

        $this->serviceFactory = new \Paymongo\Services\ServiceFactory();
    }
 
    public static function getApiUrl()
    {
        return self::$apiBaseUrl . '/' . self::$apiVersion;
    }

    public function __get($name)
    {
        $service = $this->serviceFactory->get($name);

        return new $service($this);
    }
}
