<?php

use PHPUnit\Framework\MockObject\MockObject;
use Ssitdikov\MediascoutApiClient\ApiProvider;
use PHPUnit\Framework\TestCase;
use Ssitdikov\MediascoutApiClient\Object\Client\Client;
use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;
use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Query\Client\ClientQuery;
use Ssitdikov\MediascoutApiClient\Query\Contract\ContractQuery;
use Ssitdikov\MediascoutApiClient\Query\Creative\CreativeQuery;
use Ssitdikov\MediascoutApiClient\Query\Creative\GetCreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\Client\CreateClientRequest;
use Ssitdikov\MediascoutApiClient\Request\Client\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\CreateContractRequest;
use Ssitdikov\MediascoutApiClient\Request\Creative\CreateCreativeRequest;
use Ssitdikov\MediascoutApiClient\Request\Creative\GetCreativesRequest;
use Ssitdikov\MediascoutApiClient\Response\Client\CreateClientResponse;
use Ssitdikov\MediascoutApiClient\Response\Client\GetClientsResponse;
use Ssitdikov\MediascoutApiClient\Response\Contract\CreateContractResponse;
use Ssitdikov\MediascoutApiClient\Response\Creative\CreateCreativeResponse;
use Ssitdikov\MediascoutApiClient\Response\Creative\GetCreativesResponse;

class ApiProviderTest extends TestCase
{

    private $provider;

    public function setUp(): void
    {
        $this->provider = $this->getMockBuilder(ApiProvider::class)
            ->addMethods(
                [
                    'createClient',
                    'createContract',
                    'getClients',
                    'createCreative',
                    'getCreatives'
                ]
            )->setConstructorArgs(
                [
                    $_ENV['MEDIASCOUT_ENDPOINT_URL'],
                    $_ENV['MEDIASCOUT_LOGIN'],
                    $_ENV['MEDIASCOUT_PASSWORD']
                ]
            )->getMock();
    }

    public function testCreateClient()
    {
        $client = new Client('google', '7704582421');
        $client->setLegalForm('JuridicalPerson');
        $query = new ClientQuery($client);
        $query->setCreateMode('DirectClient');
        $request = new CreateClientRequest($query);

        $this->provider->method('createClient')
            ->willReturn(new CreateClientResponse($client));

        self::assertEquals(new CreateClientResponse($client), $this->provider->createClient($request));
        self::assertSame('google', $this->provider->createClient($request)->getClient()->getName());
        self::assertSame('7704582421', $this->provider->createClient($request)->getClient()->getInn());
        self::assertSame('JuridicalPerson', $this->provider->createClient($request)->getClient()->getLegalForm());
    }

    public function testGetClients()
    {
        $request = new GetClientsRequest(new ClientQuery(new Client()));

        $this->provider->method('getClients')
            ->willReturn(new GetClientsResponse());

        self::assertEquals(new GetClientsResponse(), $this->provider->getClients($request));
    }

    public function testCreateContract()
    {
        $contract = new Contract();
        $request = new CreateContractRequest(new ContractQuery($contract));

        $this->provider->method('createContract')
            ->willReturn(new CreateContractResponse($contract));

        self::assertEquals(new CreateContractResponse($contract), $this->provider->createContract($request));
    }

    public function testCreateCreative()
    {
        $creative = new Creative();
        $request = new CreateCreativeRequest(new CreativeQuery($creative));

        $this->provider->method('createCreative')
            ->willReturn(new CreateCreativeResponse($creative));

        self::assertEquals(new CreateCreativeResponse($creative), $this->provider->createCreative($request));
    }

    public function testGetCreatives()
    {
        $creative = new Creative();
        $request = new GetCreativesRequest(new GetCreativeQuery($creative));

        $this->provider->method('getCreatives')
            ->willReturn(new GetCreativesResponse([$creative]));

        self::assertEquals(new GetCreativesResponse([$creative]), $this->provider->getCreatives($request));
    }
}
