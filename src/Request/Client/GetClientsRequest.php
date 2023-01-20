<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request\Client;

use Ssitdikov\MediascoutApiClient\Query\Client\ClientQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Client\GetClientsResponse;

class GetClientsRequest implements MediascoutApiRequestInterface
{
    private ClientQuery $clientQuery;

    /**
     * @param ClientQuery $ClientQuery
     */
    public function __construct(ClientQuery $ClientQuery)
    {
        $this->clientQuery = $ClientQuery;
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
            'json' => $this->clientQuery
        ];
    }

    public function getResultObject(): string
    {
        return GetClientsResponse::class;
    }
}
