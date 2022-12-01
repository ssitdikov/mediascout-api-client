<?php

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

$getCreative = new GetCreativesQuery();
$getCreative->setCreativeId('CR5pxRa__aRkSgUqt0JeNkoA');
$getCreative->setErid('Pb3XmBtzsyxfrdAuTGP6XfbzFdEMF1uW6xacMkr');
$getCreative->setInitialContractId('AAADgMygKIOkyGuPzl83W1ow');
$getCreative->setStatus('Active');

try {
    $result = $provider->execute(new GetCreativesRequest($getCreative));
} catch (HostNotFoundException $exception) {
    
}

print $result->getHost();
