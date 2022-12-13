<?php

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Query\CreateClientQuery;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQuery;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild\CreativeTextDataItem;
use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;
use Ssitdikov\MediascoutApiClient\Query\GetClientsQuery;
use Ssitdikov\MediascoutApiClient\Request\CreateClientRequest;
use Ssitdikov\MediascoutApiClient\Request\CreateCreativeRequest;
use Ssitdikov\MediascoutApiClient\Request\CreateFinalContractRequest;
use Ssitdikov\MediascoutApiClient\Request\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Response\CreateClientResponse;
use Ssitdikov\MediascoutApiClient\Response\CreateFinalContractResponse;
use Ssitdikov\MediascoutApiClient\Response\GetClientsResponse;
use Ssitdikov\MediascoutApiClient\Types\ClientCreationModesTypes;
use Ssitdikov\MediascoutApiClient\Types\ClientLegalFormsTypes;
use Ssitdikov\MediascoutApiClient\Types\ClientStatusTypes;
use Ssitdikov\MediascoutApiClient\Types\ContractInteractionTypes;
use Ssitdikov\MediascoutApiClient\Types\ContractTypes;
use Symfony\Component\Dotenv\Dotenv;

use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;

require_once __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

try {
    $create_client_query = (new CreateClientQuery(
        ClientCreationModesTypes::DIRECT_CLIENT,
        ClientLegalFormsTypes::JURIDICAL_PERSON,
        '7736207543',
        'ООО "Яндекс"',
    ))
        ->setOksmNumber('643');

    /* @var CreateClientResponse $create_client_response */
    $create_client_response = $provider->execute(
        new CreateClientRequest(
            $create_client_query
        )
    );

    $client_object = (new GetClientsQuery())
        ->setInn('7736207543')
        ->setStatus(ClientStatusTypes::ACTIVE);

    /* @var GetClientsResponse $get_clients_response */
    $get_clients_response = $provider->execute(
        new GetClientsRequest(
            $client_object
        )
    );

    $client_id = $get_clients_response->getClients()[0]->getId();

    $create_final_contract_query = (new CreateFinalContractQuery(
        '33',
        new DateTime(),
        true,
        $client_id,
        ContractTypes::SERVICE_AGREEMENT
    ))
        ->setAmount(100000)
        ->setSubjectType(ContractInteractionTypes::DISTRIBUTION);

    /* @var CreateFinalContractResponse $create_final_contract_response */
    $create_final_contract_response = $provider->execute(
        new CreateFinalContractRequest(
            $create_final_contract_query
        )
    );

    $creative = new CreateCreativeQuery(
        $create_final_contract_response->getContract()->getId(),
        $create_final_contract_response->getContract()->getId(),
        'CPM',
        'TextGraphic',
        'https://yandex.ru'
    );

    $creative->setDescription('Описание креатива 4H67RLZG');
    $creative->setTargetAudience('Тестовый креатив');

    $text_data = new CreativeTextDataItem('Некий текст');
    $creative->setTextData($text_data);

    $result = $provider->execute(new CreateCreativeRequest($creative));

    print_r($result);
} catch (HostNotFoundException $exception) {
} catch (\Exception $exception) {
}
