<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetClientsQuery;
use Ssitdikov\MediascoutApiClient\Response\GetClientsResponse;

class GetClientsRequest implements MediascoutApiRequestInterface
{

    private GetClientsQuery $getClientsQuery;

    /**
     * GetClientsRequest constructor.
     * @param GetClientsQuery $getClientsQuery
     */
    public function __construct(GetClientsQuery $getClientsQuery)
    {
        $this->getClientsQuery = $getClientsQuery;
    }


    public function getRoute(): string
    {
        return '/Clients/GetClients';
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
            'json' => $this->getClientsQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return GetClientsResponse::class;
    }

}
