<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateInitialContractQuery;
use Ssitdikov\MediascoutApiClient\Query\GetInitialContractsQuery;
use Ssitdikov\MediascoutApiClient\Request\CreateInitialContractRequest;
use Ssitdikov\MediascoutApiClient\Request\GetInitialContractsRequest;
use Ssitdikov\MediascoutApiClient\Response\CreateInitialContractResponse;
use Ssitdikov\MediascoutApiClient\Types\ContractInteractionTypes;
use Ssitdikov\MediascoutApiClient\Types\ContractStatusTypes;
use Ssitdikov\MediascoutApiClient\Types\ContractTypes;
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
    $createInitialContractQuery = (new CreateInitialContractQuery
    (
        '33',
        new DateTime('2022-12-05'),
        true,
        'CLhY5jCy05xUakX7iyKGesew',
        ContractTypes::SERVICE_AGREEMENT,
        'CTbRsfrrH5k02pYERqz7M0zw',
        'CLosG-tm5H_kiLEEZELl4rxw'
    ))
        ->setAmount(17500)
        ->setSubjectType(ContractInteractionTypes::DISTRIBUTION);

    /* @var CreateInitialContractResponse $createInitialContractResponse */
    $createInitialContractResponse = $provider->execute(
        new CreateInitialContractRequest(
            $createInitialContractQuery
        )
    );

    $getInitialContractsQuery = (new GetInitialContractsQuery())
        ->setInitialContractId('CTe6YI6-ilHUG518BIgRJjVQ')
        ->setFinalContractId('CTbRsfrrH5k02pYERqz7M0zw')
        ->setClientId('CLhY5jCy05xUakX7iyKGesew')
        ->setStatus(ContractStatusTypes::ACTIVE);

    $getFinalContractsResponse = $provider->execute(
        new GetInitialContractsRequest(
            $getInitialContractsQuery
        )
    );

} catch (HostNotFoundException $exception) {
}
