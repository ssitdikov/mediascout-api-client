<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetFinalContractsQuery;
use Ssitdikov\MediascoutApiClient\Response\GetFinalContractsResponse;

class GetFinalContractsRequest implements MediascoutApiRequestInterface
{
    private GetFinalContractsQuery $getFinalContractsQuery;

    /**
     * GetFinalContractsRequest constructor.
     * @param GetFinalContractsQuery $getFinalContractsQuery
     */
    public function __construct(GetFinalContractsQuery $getFinalContractsQuery)
    {
        $this->getFinalContractsQuery = $getFinalContractsQuery;
    }


    public function getRoute(): string
    {
        return '/Contracts/GetFinalContracts';
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
            'json' => $this->getFinalContractsQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return GetFinalContractsResponse::class;
    }
}
