<?php

$paymongoSrcDirectory = dirname(__FILE__) . '/src';

require $paymongoSrcDirectory . '/Paymongo.php';

//HTTPClient
require $paymongoSrcDirectory . '/HttpClient.php';

//Traits
require $paymongoSrcDirectory . '/Trait/Create.php';
require $paymongoSrcDirectory . '/Trait/Get.php';
require $paymongoSrcDirectory . '/Trait/Index.php';

//Objects
require $paymongoSrcDirectory . '/Token.php';
require $paymongoSrcDirectory . '/Payment.php';

//Exceptions
require $paymongoSrcDirectory . '/Exception/ApiException.php';
require $paymongoSrcDirectory . '/Exception/AuthenticationException.php';