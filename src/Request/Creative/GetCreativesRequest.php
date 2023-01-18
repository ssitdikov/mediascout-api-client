<?php

namespace Ssitdikov\MediascoutApiClient\Request\Creative;

use Ssitdikov\MediascoutApiClient\Query\Creative\GetCreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Creative\GetCreativesResponse;

class GetCreativesRequest implements MediascoutApiRequestInterface
{
    private GetCreativeQuery $creative;

    /**
     * @param GetCreativeQuery $creative
     */
    public function __construct(GetCreativeQuery $creative)
    {
        $this->creative = $creative;
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
            'json' => $this->creative->jsonSerialize(),
        ];
    }

    public function getResultObject(): string
    {
        return GetCreativesResponse::class;
    }
}
