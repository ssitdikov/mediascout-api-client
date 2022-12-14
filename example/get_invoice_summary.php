<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\GetInvoiceSummaryQuery;
use Ssitdikov\MediascoutApiClient\Request\GetInvoiceSummaryRequest;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$getInvoiceSummaryQuery = new GetInvoiceSummaryQuery('1');

try {
    $result = $provider->execute(new GetInvoiceSummaryRequest($getInvoiceSummaryQuery));
} catch (HostNotFoundException $exception) {
    return $exception;
}
