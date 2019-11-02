<?php
 
namespace Paymongo;

use Paymongo\HttpClient;
 
/**
 * Class Token
 */
 
class Token {
    
    use ApiMethods\Create;
    use ApiMethods\Get;

    const PATH = 'tokens';
}
