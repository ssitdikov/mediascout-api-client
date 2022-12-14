<?php

declare(strict_types=1);


use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\SupplementInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Request\GetInvoicesRequest;
use Ssitdikov\MediascoutApiClient\Request\SupplementInvoiceRequest;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$sup = new SupplementInvoiceQuery('123');

try {
    $result = $provider->execute(new SupplementInvoiceRequest($sup));

} catch (HostNotFoundException $exception) {

}
