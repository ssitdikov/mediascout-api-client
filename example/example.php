<?php

declare(strict_types=1);

use Ssitdikov\MediascoutApiClient\ApiProvider;
use Ssitdikov\MediascoutApiClient\Exception\ClientNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\Client\Client;
use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;
use Ssitdikov\MediascoutApiClient\Object\Contract\InitialContract;
use Ssitdikov\MediascoutApiClient\Query\Client\ClientQuery;
use Ssitdikov\MediascoutApiClient\Query\Client\GetClientQuery;
use Ssitdikov\MediascoutApiClient\Query\Contract\ContractQuery;
use Ssitdikov\MediascoutApiClient\Request\Client\CreateClientRequest;
use Ssitdikov\MediascoutApiClient\Request\Client\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\CreateContractRequest;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../.env';
$dotenv = new Dotenv();
$dotenv->load($path);

$endpoint = $_ENV['MEDIASCOUT_ENDPOINT_URL'];
$login = $_ENV['MEDIASCOUT_LOGIN'];
$password = $_ENV['MEDIASCOUT_PASSWORD'];

$provider = new ApiProvider($endpoint, $login, $password);

$json = '
{
 "clients": [
  {
   "form": "JuridicalPerson",
   "type": "DirectClient",
   "inn": "",
   "name": ""
  },
  {
   "form": "JuridicalPerson",
   "type": "InitialContractClient",
   "inn": "",
   "name": ""
  }
 ],
 "contracts": [
  {
   "contracttype": "final",
   "number": "125/22",
   "date": "2022-08-31T21:00:00Z",
   "amount": 66500,
   "vatIncluded": "false",
   "clientInn": "",
   "contractorInn": "",
   "finalContract": "",
   "type": "ServiceAgreement",
   "parentMainContract": ""
  },
  {
   "contracttype": "initial",
   "number": "",
   "date": "2022-05-22T21:00:00Z",
   "amount": 66500,
   "vatIncluded": "false",
   "clientInn": "",
   "contractorInn": "",
   "finalContract": "",
   "type": "MediationContract",
   "parentMainContract": ""
  }
 ],
 "link": ""
}';

$request = json_decode($json, false, 32, JSON_THROW_ON_ERROR);

$clients = [];

foreach ($request->clients as $client) {
    $obj_client = (new Client())
        ->setLegalForm($client->form)
        ->setInn($client->inn)
        ->setName($client->name);
    $query = new ClientQuery($obj_client);

    try {
        $result = $provider->getClients(new GetClientsRequest($query));
        foreach ($result->getClients() as $response_client) {
            $clients[$response_client->getInn()] = $response_client;
        }
    } catch (ClientNotFoundException $exception) {
        $query = (new ClientQuery($obj_client))
            ->setCreateMode($client->type);
        $result = $provider->createClient(new CreateClientRequest($query));
        $clients[$result->getClient()->getInn()] = $result->getClient();
    } catch (\Exception $exception) {
    }
}

$contracts = [];
foreach ($request->contracts as $contract) {
    $obj_contract = (new Contract())
        ->setClientId($clients[$contract->clientInn]->getId())
        ->setNumber($contract->number)
        ->setDate(new DateTime($contract->date))
        ->setAmount($contract->amount)
        ->setVatIncluded(filter_var($contract->vatIncluded, FILTER_VALIDATE_BOOLEAN))
        ->setType($contract->type);
    if ($contract->contracttype === 'initial') {
        $obj_contract
            ->setFinalContractId($contracts[$contract->finalContract . '-' . $contract->contractorInn])
            ->setContractorId($clients[$contract->contractorInn]->getId());
    }

    $query = new ContractQuery($obj_contract);

    try {
        $result = $provider->execute(new CreateContractRequest($query));
        $contracts[$contract->number . '-' . $contract->clientInn] = $result->getContract()->getId();
    } catch (\Exception $exception) {
        var_dump($exception->getMessage());
    }
}

var_dump($contracts);
