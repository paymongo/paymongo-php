<?php
 
//use init.php when not using composer's autoload
//require '/pathtopaymongo/init.php'
require 'init.php';
  
//SET API key
\Paymongo\Paymongo::setApiKey('sk_test_KxoWHHv6WcUJchgbZD9AgsyT');

try {
    $paymentIntent = \PayMongo\PaymentIntent::create(
        [
            'amount' => '100',
            'currency' => 'PHP',
            'payment_method_allowed' => [
                'card'
            ],
        ]
    );
    var_dump($paymentIntent);
    die();
    //Create Token
    $token = \Paymongo\Token::create(
        [
            'number' => '4123450131000508',
            'exp_month' => 10,
            'exp_year' => 22,
            'cvc' => '123',
            'billing' => [
                'address' => [
                    'line1' => '',
                    'line2' => '',
                    'city' => '',
                    'state' => '',
                    'postal_code' => '',
                    'country' => ''
                ],
                'name' => 'asdf',
                'email' => 'kp.bongolan@gmail.com',
                'phone' => '',
            ]
        ]
    );
    //Create Payment using token
    $payment = \Paymongo\Payment::create(
        [
            'amount' => 100,
            'currency' => 'PHP',
            'description' => 'asdf',
            'source' => [
                'id' => $token->id,
                'type' => 'token',
            ],
            'statement_descriptor' => 'asdf'
        ]
    );
} catch (\Paymongo\Exceptions\AuthenticationException $exception) {
    echo "Auth Exception";
} catch (\PayMongo\Exceptions\InvalidRequestException $exception) {
    var_dump($exception->errors());
    echo '<br />';
    echo '-----';
    echo '<br />';
    var_dump($exception->errors('amount'));
}
//Get token record to check token status
// $token = \Paymongo\Token::get('tok_ZY5dUb3EWpAe88uUvg8DTJLc');
// //Get payment record
// $payment = \Paymongo\Payment::get('pay_dH1jT3kT3shJEUnATEaT5btQ');
// //List all payments
// $payments = \Paymongo\Payment::index();
