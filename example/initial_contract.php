<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateInitialContractQuery;
use Ssitdikov\MediascoutApiClient\Request\CreateInitialContractRequest;
use Ssitdikov\MediascoutApiClient\Response\CreateInitialContractResponse;
use Ssitdikov\MediascoutApiClient\Types\ContractInteractionTypes;
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
    $query = (new CreateInitialContractQuery
    (
        '27',
        '2022-11-30',
        true,
        'CLhY5jCy05xUakX7iyKGesew',
        ContractTypes::SERVICE_AGREEMENT,
        'CTSmzOxt_FO0WP9TgTtiJ7zg',
        'CLosG-tm5H_kiLEEZELl4rxw'
    ))
        ->setAmount(17500)
        ->setSubjectType(ContractInteractionTypes::DISTRIBUTION);

    /* @var CreateInitialContractResponse $result */
    $result = $provider->execute(
        new CreateInitialContractRequest(
            $query
        )
    );
} catch (NotHostFoundException $exception) {
}
var_dump($result);
