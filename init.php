<?php

$paymongoSrcDirectory = dirname(__FILE__) . '/src';

require $paymongoSrcDirectory . '/Paymongo.php';

//HTTPClient
require $paymongoSrcDirectory . '/HttpClient.php';

//API Methods
require $paymongoSrcDirectory . '/ApiMethods/Create.php';
require $paymongoSrcDirectory . '/ApiMethods/Get.php';
require $paymongoSrcDirectory . '/ApiMethods/Index.php';

//Objects
require $paymongoSrcDirectory . '/Token.php';
require $paymongoSrcDirectory . '/Payment.php';

//Exceptions
require $paymongoSrcDirectory . '/Exception/ApiException.php';
require $paymongoSrcDirectory . '/Exception/AuthenticationException.php';