<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Query\CreateClientQuery;
use Ssitdikov\MediascoutApiClient\Query\GetClientsQuery;
use Ssitdikov\MediascoutApiClient\Request\CreateClientRequest;
use Ssitdikov\MediascoutApiClient\Request\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Response\CreateClientResponse;
use Ssitdikov\MediascoutApiClient\Types\ClientCreationModesTypes;
use Ssitdikov\MediascoutApiClient\Types\ClientLegalFormsTypes;
use Ssitdikov\MediascoutApiClient\Types\ClientStatusTypes;
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
    $createClientQuery = (new CreateClientQuery(
        ClientCreationModesTypes::DIRECT_CLIENT,
        ClientLegalFormsTypes::JURIDICAL_PERSON,
        '7743001840',
        'ООО "ВК"',
    ))
        ->setOksmNumber('643');

    /* @var CreateClientResponse  $createClientResponse */
    $createClientResponse = $provider->execute(
        new CreateClientRequest(
            $createClientQuery
        )
    );

    $getClientsQuery = (new GetClientsQuery())
//        ->setInn('7743001840')
    ->setStatus(ClientStatusTypes::ACTIVE);

    $getClientsResponse = $provider->execute(
        new GetClientsRequest(
            $getClientsQuery
        )
    );
} catch (NotHostFoundException $exception) {
}
print_r($getClientsResponse);
