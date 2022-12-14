<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetInitialContractsQuery;
use Ssitdikov\MediascoutApiClient\Response\GetInitialContractsResponse;

class GetInitialContractsRequest implements MediascoutApiRequestInterface
{
    private GetInitialContractsQuery $getInitialContractsQuery;

    /**
     * GetInitialContractsRequest constructor.
     * @param GetInitialContractsQuery $getInitialContractsQuery
     */
    public function __construct(GetInitialContractsQuery $getInitialContractsQuery)
    {
        $this->getInitialContractsQuery = $getInitialContractsQuery;
    }


    public function getRoute(): string
    {
        return '/Contracts/GetInitialContracts';
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
            'json' => $this->getInitialContractsQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return GetInitialContractsResponse::class;
    }
}
