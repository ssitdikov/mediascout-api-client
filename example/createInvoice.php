<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceInitialContractItem;
use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceStatisticsByPlatformsItem;
use Ssitdikov\MediascoutApiClient\Request\CreateInvoiceRequest;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$path = __DIR__.'/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$createInvoiceQuery = new CreateInvoiceQuery('777', 'rd', 'rd',100, true, 'CTSmzOxt_FO0WP9TgTtiJ7zg');
$createInvoiceQuery->setDate('2022-07-25');
$createInvoiceQuery->setEndDate('2022-12-26');
$createInvoiceQuery->setStartDate(date('Y-m-d'));

$initialContractData = new InvoiceInitialContractItem('CTe6YI6-ilHUG518BIgRJjVQ', 100, true);
$stats = new InvoiceStatisticsByPlatformsItem('id', 'url', 777, 100, 100, 100, true);
$stats->setPlatformName('platform name');
$stats->setPlatformType('platform type');
$stats->setPlatformOwnedByAgency(true);
$stats->setStartDatePlan('2022-07-25');
$stats->setStartDateFact('2022-07-26');
$stats->setEndDateFact('2022-11-28');
$stats->setEndDatePlan('2022-10-27');
$stats->setInitialContractId('id');

$createInvoiceQuery->setInitialContractsData($initialContractData);
$createInvoiceQuery->setStatisticsByPlatforms($stats);

try {
    $result = $provider->execute(new CreateInvoiceRequest($createInvoiceQuery));

} catch (NotHostFoundException $exception) {

}
