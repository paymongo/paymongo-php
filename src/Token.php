<?php
 
namespace PayMongo;

use PayMongo\HttpClient;

/**
 * Class Token
 */
 
class Token extends PayMongoEntity
{
    use ApiMethods\Create;
    use ApiMethods\Get;

    const PATH = 'tokens';
}
