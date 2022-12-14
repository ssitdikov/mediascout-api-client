<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Request\GetCreativesRequest;
use Ssitdikov\MediascoutApiClient\Query\GetCreativesQuery;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$getCreativeQuery = new GetCreativesQuery();
$getCreativeQuery->setCreativeId('CR5pxRa__aRkSgUqt0JeNkoA');
$getCreativeQuery->setErid('Pb3XmBtzsyxfrdAuTGP6XfbzFdEMF1uW6xacMkr');
$getCreativeQuery->setInitialContractId('AAADgMygKIOkyGuPzl83W1ow');
$getCreativeQuery->setStatus('Active');

try {
    $result = $provider->execute(new GetCreativesRequest($getCreativeQuery));
} catch (HostNotFoundException $exception) {

}
