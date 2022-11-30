<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Request\PingRequest;
use Ssitdikov\MediascoutApiClient\Response\PingResponse;

require __DIR__ . '/../vendor/autoload.php';

$provider = new ApiProvider('https://demo.mediascout.ru/webapi');
/* @var PingResponse $result */
$result = $provider->execute(new PingRequest());

print $result->getHost();
