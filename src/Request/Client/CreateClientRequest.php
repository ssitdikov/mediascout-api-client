<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request\Client;

use Ssitdikov\MediascoutApiClient\Query\Client\ClientQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Client\CreateClientResponse;

class CreateClientRequest implements MediascoutApiRequestInterface
{
    private ClientQuery $createClientQuery;

    /**
     * @param ClientQuery $createClientQuery
     */
    public function __construct(ClientQuery $createClientQuery)
    {
        $this->createClientQuery = $createClientQuery;
    }

    public function getRoute(): string
    {
        return '/clients';
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
            'json' => $this->createClientQuery
        ];
    }

    public function getResultObject(): string
    {
        return CreateClientResponse::class;
    }
}
