# PayMongo PHP

PayMongo PHP library provides PHP applications an easy access to the PayMongo API. Explore various classes that can represent API resources on object instantiation. The goal of this library is simplify PayMongo integration with any PHP applications.

Check [example.php](https://github.com/paymongo/paymongo-php/blob/development/example.php) see usage examples.

## Pending Todos
- [ ] Unit Tests
- [ ] Code Cleanup and Improvements

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require paymongo/paymongo-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you prefer to manually install the library instead of using composer, you can download the [latest release](https://github.com/paymongo/paymongo-php/releases). Then, to use the bindings, include the `initialize.php` file.

```php
require_once('/path/to/paymongo-php/initialize.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php)
-   [`json`](https://secure.php.net/manual/en/book.json.php)
-   [`mbstring`](https://www.php.net/manual/en/book.mbstring.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that the required extensions are available.

## Getting Started

Simple usage looks like:

```php
$client = new \Paymongo\PaymongoClient('sk_test_BQokikJOvBiI2HlWgH4b2fQ2');
$paymentIntent = $client->paymentIntents->create([
    'amount' => 10000,
    'currency' => 'PHP',
    'payment_method_allowed' => ['card']
]);

echo $paymentIntent->id;
```

## Handle errors

```php
try {
    $client = new \Paymongo\PaymongoClient('sk_test_BQokikJOvBiI2HlWgH4b2fQ2');
    $paymentIntent = $client->paymentIntents->create([
        'amount' => 10000,
        'currency' => 'PHP',
        'payment_method_allowed' => ['card']
    ]);
} catch(\Paymongo\Exceptions\InvalidRequestException $e) {
   print "<pre>";
   print_r($e->getError());
   print "</pre>";
}
```

## Verifying webhook signature

```php
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
    echo 'invalid signature';
}
```

To learn more about PayMongo's API, please check our developer [documentation](https://developers.paymongo.com).