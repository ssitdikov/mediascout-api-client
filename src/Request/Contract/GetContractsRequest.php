<?php

namespace Ssitdikov\MediascoutApiClient\Request\Contract;

use Ssitdikov\MediascoutApiClient\Query\Contract\GetContractQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Contract\GetContractsResponse;

class GetContractsRequest implements MediascoutApiRequestInterface
{
    private GetContractQuery $contract;

    /**
     * @param GetContractQuery $contract
     */
    public function __construct(GetContractQuery $contract)
    {
        $this->contract = $contract;
    }

    public function getRoute(): string
    {
        $baseRoute = '/contracts/final';
        $data = $this->contract->jsonSerialize();

        if (!empty($data['ClientId'])) {
            $query = http_build_query([
                'ClientId' => $data['ClientId']
            ]);
            return $baseRoute . '?' . $query;
        }

        return $baseRoute;
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
