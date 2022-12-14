<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;
use Ssitdikov\MediascoutApiClient\Query\GetFinalContractsQuery;
use Ssitdikov\MediascoutApiClient\Request\CreateFinalContractRequest;
use Ssitdikov\MediascoutApiClient\Request\GetFinalContractsRequest;
use Ssitdikov\MediascoutApiClient\Response\CreateFinalContractResponse;
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
    $createFinalContractQuery = (new CreateFinalContractQuery(
        '33',
        new DateTime('2022-12-05'),
        true,
        'CLhY5jCy05xUakX7iyKGesew',
        ContractTypes::SERVICE_AGREEMENT
    ))
        ->setAmount(100000)
        ->setSubjectType(ContractInteractionTypes::DISTRIBUTION);

    /* @var CreateFinalContractResponse $createFinalContractResponse */
    $createFinalContractResponse = $provider->execute(
        new CreateFinalContractRequest(
            $createFinalContractQuery
        )
    );

    $getFinalContractsQuery = (new GetFinalContractsQuery())
        ->setClientId('CLhY5jCy05xUakX7iyKGesew')
        ->setStatus(ContractStatusTypes::ACTIVE);

    $getFinalContractResponse = $provider->execute(
        new GetFinalContractsRequest(
            $getFinalContractsQuery
        )
    );
} catch (HostNotFoundException $exception) {
}
