<?php

require __DIR__ . '/vendor/autoload.php';

use Lametric\Github;

$response = new Github\Response();

try {

    $parameters = new Github\Validation($_GET);
    $api = new Github\Api();
    $api->setParameters($parameters->getParameters());

    echo $response->setData($api->getResult());

} catch (Exception $e) {

    echo $response->setUnAuthorized();

}
