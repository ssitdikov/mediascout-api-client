<?php

namespace Ssitdikov\MediascoutApiClient\Request\Contract;

use Ssitdikov\MediascoutApiClient\Query\Contract\GetOuterContractQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Contract\GetContractsResponse;

class GetOuterContractsRequest implements MediascoutApiRequestInterface
{
    private GetOuterContractQuery $contract;

    /**
     * @param GetOuterContractQuery $contract
     */
    public function __construct(GetOuterContractQuery $contract)
    {
        $this->contract = $contract;
    }

    public function getRoute(): string
    {
        $baseRoute = '/contracts/outer';
        $data = $this->contract->jsonSerialize();

        if (!empty($data['ContractorInn']) && !empty($data['ClientInn'])) {
            $query = http_build_query([
                'ContractorInn' => $data['ContractorInn'],
                'ClientInn' => $data['ClientInn']
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
