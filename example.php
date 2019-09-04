<?php
 
//use init.php when not using composer's autoload
//require '/pathtopaymongo/init.php'
// This require is for demo purposes only. If you're using composer, require using its autoloader. Please check the README.md for more info.
require 'initialize.php';
  

// Initialize the client
$client = new \Paymongo\PaymongoClient('your secret API key here');

// Error handling
try {
    $client = new \Paymongo\PaymongoClient('invalid secret api key');
    // Some paymongo API calls
} catch (\Paymongo\Exceptions\AuthenticationException $e) {
    // handle error if api key is invalid.
}

try {
    $client = new \Paymongo\PaymongoClient('secret API key');
    $payment = $client->payments->create([
        // incorrect payload
    ]);
} catch (\Paymongo\Exceptions\InvalidRequestException $e) {
    // handle error if there's validation error
    foreach($e->getError() as $error) {
        echo $error->code;
        echo $error->detail;
    }
}

// Retrieve a payment method
$paymentMethod = $client->paymentMethods->retrieve('insert payment method id here');

// Create a payment intent
$newPaymentIntent = $client->paymentIntents->create([
    'amount' => 10000,
    // other payload
]);

// Retrieve a payment intent
$paymentIntent = $client->paymentIntents->retrieve('insert payment intent id here');

// create source
$source = $client->sources->create([
    // insert payload here
]);

// Verifying webhook signature
try {
    $payload = @file_get_contents('php://input');
    $signatureHeader = $_SERVER['HTTP_PAYMONGO_SIGNATURE'];
    $webhookSecretKey = 'your webhook secret key here';

    $event = $client->webhooks->constructEvent([
        'payload' => $payload,
        'signature_header' => $signatureHeader,
        'webhook_secret_key' => $webhookSecretKey
    ]);

    echo $event->id;
    echo $event->type;
    print "<pre>";
    print_r($event->resource);
    print "</pre>";
    die();

} catch (\Paymongo\Exceptions\SignatureVerificationException $e) {
    // handle error if webhook signature is not verified.
    echo 'invalid signature';
}

echo $payment->id;