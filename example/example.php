<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Exception\TypeErrorException;
use Ssitdikov\MediascoutApiClient\Query\GetClientsQuery;
use Ssitdikov\MediascoutApiClient\Request\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Response\GetClientsResponse;
use Ssitdikov\MediascoutApiClient\Types\ClientStatusTypes;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

try {
    $client_object = (new \Ssitdikov\MediascoutApiClient\Query\CreateClientQuery(
        \Ssitdikov\MediascoutApiClient\Types\ClientCreationModesTypes::DIRECT_CLIENT,
        \Ssitdikov\MediascoutApiClient\Types\ClientLegalFormsTypes::JURIDICAL_PERSON,
        '7736207543',
        'ООО Яндекс'
    ));

    try {
        /* @var GetClientsResponse $get_clients_response */
        $get_clients_response = $provider->execute(
            new \Ssitdikov\MediascoutApiClient\Request\CreateClientRequest(
                $client_object
            )
        );
        var_dump($get_clients_response);
    } catch (TypeErrorException $exception) {
        print $exception->getMessage();
    } catch (Exception $exception) {
        print 'Error: ' . $exception->getMessage();
    }
} catch (HostNotFoundException $exception) {
} catch (Exception $exception) {
}
