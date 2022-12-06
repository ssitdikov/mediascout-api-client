<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreatePlatformQuery;
use Ssitdikov\MediascoutApiClient\Request\CreatePlatformRequest;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$createPlatformQuery = new CreatePlatformQuery('Тестовая площадка', 'Site', 'http://Z2MRPWHQ74Q.com', false, 'CLZPHWhfJK9k-HcjO_fL14cA');


try {
    $result = $provider->execute(new CreatePlatformRequest($createPlatformQuery));

} catch (NotHostFoundException $exception) {

}