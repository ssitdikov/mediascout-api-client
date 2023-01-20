<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\InitialContract;
use Ssitdikov\MediascoutApiClient\Query\Contract\ContractQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Contract\CreateContractResponse;
use Ssitdikov\MediascoutApiClient\Response\CreateFinalContractResponse;

class CreateContractRequest implements MediascoutApiRequestInterface
{
    private ContractQuery $query;

    /**
     * @param ContractQuery $query
     */
    public function __construct(ContractQuery $query)
    {
        $this->query = $query;
    }

    public function getRoute(): string
    {
        return $this->query->getContract()->getFinalContractId()
            ? '/Contracts/CreateInitialContract' : '/Contracts/CreateFinalContract';
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
            'json' => $this->query
        ];
    }

    public function getResultObject(): string
    {
        return CreateContractResponse::class;
    }
}
