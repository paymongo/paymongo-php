<?php
 
namespace PayMongo;

use PayMongo\HttpClient;

/**
 * Class Token
 */
 
class Token
{
    use ApiMethods\Create;
    use ApiMethods\Get;

    const PATH = 'tokens';
}
