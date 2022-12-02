<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetCreativesQuery;
use Ssitdikov\MediascoutApiClient\Response\GetCreativesResponse;

class GetCreativesRequest implements MediascoutApiRequestInterface
{
    private GetCreativesQuery $creativesQuery;

    public function __construct(GetCreativesQuery $creativesQuery)
    {
        $this->creativesQuery = $creativesQuery;
    }

    public function getRoute(): string
    {
        return '/Creatives/GetCreatives';
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
            'json' => $this->creativesQuery,
        ];
    }

    public function getResultObject(): string
    {
        return GetCreativesResponse::class;
    }

}