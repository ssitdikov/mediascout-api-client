<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;
use Ssitdikov\MediascoutApiClient\Query\CreateInitialContractQuery;
use Ssitdikov\MediascoutApiClient\Response\CreateInitialContractResponse;

class CreateInitialContractRequest implements MediascoutApiRequestInterface
{

    private CreateInitialContractQuery $createInitialContractQuery;

    /**
     * CreateInitialContractRequest constructor.
     * @param CreateFinalContractQuery $createInitialContractQuery
     */
    public function __construct(CreateInitialContractQuery $createInitialContractQuery)
    {
        $this->createInitialContractQuery = $createInitialContractQuery;
    }

    public function getRoute(): string
    {
        return '/Contracts/CreateInitialContract';
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
            'json' => $this->createInitialContractQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return CreateInitialContractResponse::class;
    }

}
