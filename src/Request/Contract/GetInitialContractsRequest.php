<?php

namespace Ssitdikov\MediascoutApiClient\Request\Contract;

use Ssitdikov\MediascoutApiClient\Query\Contract\GetContractQuery;
use Ssitdikov\MediascoutApiClient\Query\Contract\GetInitialContractQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Contract\GetContractsResponse;

class GetInitialContractsRequest implements MediascoutApiRequestInterface
{
    private GetInitialContractQuery $contract;

    /**
     * @param GetInitialContractQuery $contract
     */
    public function __construct(GetInitialContractQuery $contract)
    {
        $this->contract = $contract;
    }

    public function getRoute(): string
    {
        return '/contracts/initial';
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_GET;
    }

    public function getHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    public function getParams(): array
    {
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->contract->jsonSerialize(),
        ];
    }

    public function getResultObject(): string
    {
        return GetContractsResponse::class;
    }
}
