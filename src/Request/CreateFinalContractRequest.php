<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;
use Ssitdikov\MediascoutApiClient\Response\CreateFinalContractResponse;

class CreateFinalContractRequest implements MediascoutApiRequestInterface
{
    private CreateFinalContractQuery $createFinalContractQuery;

    /**
     * CreateFinalContractRequest constructor.
     * @param CreateFinalContractQuery $createFinalContractQuery
     */
    public function __construct(CreateFinalContractQuery $createFinalContractQuery)
    {
        $this->createFinalContractQuery = $createFinalContractQuery;
    }

    public function getRoute(): string
    {
        return '/Contracts/CreateFinalContract';
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
            'json' => $this->createFinalContractQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return CreateFinalContractResponse::class;
    }
}
