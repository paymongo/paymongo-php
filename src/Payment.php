<?php
 
namespace PayMongo;

use PayMongo\HttpClient;

/**
 * Class Token
 */
 
class Payment
{
    use ApiMethods\Create;
    use ApiMethods\Get;
    use ApiMethods\Index;

    const PATH = 'payments';
}
