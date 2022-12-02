<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Request\PingAuthRequest;
use Ssitdikov\MediascoutApiClient\Response\PingResponse;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

try {
    $result = $provider->execute(new PingAuthRequest());
} catch (NotHostFoundException $exception) {

}
print $result->getHost();
