<?php
 
namespace Paymongo;

use Paymongo\HttpClient;

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
