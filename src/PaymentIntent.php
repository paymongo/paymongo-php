<?php

namespace PayMongo;

use PayMongo\HttpClient;

/**
 * Class Token
 */

class PaymentIntent extends PayMongoEntity
{
    use ApiMethods\Create {
        create as apiMethodCreate;
    }
    use ApiMethods\Get;

    const PATH = 'payment_intents';

    public static function create(array $params)
    {
        if (isset($params['amount']) && is_numeric($params['amount'])) {
            $params['amount'] = $params['amount']*100;
        }
        
        return self::apiMethodCreate($params);
    }
}
