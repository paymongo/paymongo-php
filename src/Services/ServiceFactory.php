<?php

namespace Paymongo\Services;


class ServiceFactory {
    private $classes = [
        'links' => \Paymongo\Services\LinkService::class,
        'customers' => \Paymongo\Services\CustomerService::class,
        'payments' => \Paymongo\Services\PaymentService::class,
        'paymentIntents' => \Paymongo\Services\PaymentIntentService::class,
        'paymentMethods' => \Paymongo\Services\PaymentMethodService::class,
        'refunds' => \Paymongo\Services\RefundService::class,
        'sources' => \Paymongo\Services\SourceService::class,
        'webhooks' => \Paymongo\Services\WebhookService::class,
    ];

    public function get($name)
    {
        if(\array_key_exists($name, $this->classes)) {
            return $this->classes[$name];
        } else {
            throw new \Paymongo\Exceptions\InvalidServiceException("Service ${name} does not exists.");
        }
    }
}