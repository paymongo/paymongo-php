<?php
 
namespace PayMongo;

use PayMongo\HttpClient;

/**
 * Class Token
 */
 
class Payment extends PayMongoEntity
{
    use ApiMethods\Create {
        create as apiMethodCreate;
    }
    use ApiMethods\Get;
    use ApiMethods\Index;

    const PATH = 'payments';

    public static function create(array $params)
    {
        if (isset($params['amount']) && is_numeric($params['amount'])) {
            $params['amount'] = $params['amount']*100;
        }
        
        return self::apiMethodCreate($params);
    }
}
