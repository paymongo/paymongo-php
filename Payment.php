<?php
 
namespace Paymongo;

use Paymongo\HttpClient;
 
/**
 * Class Token
 */
 
class Payment {
    
    use Object\Create;
    use Object\Get;
    use Object\Index;

    const PATH = 'payments';
}
