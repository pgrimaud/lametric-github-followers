<?php

require __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/parameters.php';

Sentry\init(['dsn' => $config['sentry_key']]);

use Github\{Api, Response, Validation};

$response = new Response();

try {
    $parameters = new Validation($_GET);

    $api = new Api();
    $api->setParameters($parameters->getParameters());

    echo $response->setData($api->getResult());

} catch (Exception $e) {
    echo $response->setError('Unknown user');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $response->setError('Internal error');
}
