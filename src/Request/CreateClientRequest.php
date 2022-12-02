<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\CreateClientQuery;
use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;
use Ssitdikov\MediascoutApiClient\Response\CreateClientResponse;
use Ssitdikov\MediascoutApiClient\Response\CreateFinalContractResponse;

class CreateClientRequest implements MediascoutApiRequestInterface
{

    private CreateClientQuery $createClientQuery;

    /**
     * CreateClientRequest constructor.
     * @param CreateClientQuery $createClientQuery
     */
    public function __construct(CreateClientQuery $createClientQuery)
    {
        $this->createClientQuery = $createClientQuery;
    }


    public function getRoute(): string
    {
        return '/Clients/CreateClient';
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_POST;
    }

    public function getHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    public function getParams(): array
    {
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->createClientQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return CreateClientResponse::class;
    }

}
