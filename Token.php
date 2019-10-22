<?php
 
namespace Paymongo;

use Paymongo\HttpClient;
 
/**
 * Class Token
 */
 
class Token {
    
    use Object\Create;
    use Object\Get;

    const PATH = 'tokens';
 
    // public function get($id)
    // {
    //     $result = HttpClient::request('GET', Paymongo::getApiUrl() . 'tokens' . '/' . urlencode($id) , '', '');
    //     return (object) $result['data'];
    // }
}
