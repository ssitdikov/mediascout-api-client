<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\DeleteInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Request\DeleteInvoiceRequest as DeleteInvoiceRequestAlias;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$deleteInvoice = new DeleteInvoiceQuery('123');

try {
    $result = $provider->execute(new DeleteInvoiceRequestAlias($deleteInvoice));
} catch (HostNotFoundException $exception) {

}
