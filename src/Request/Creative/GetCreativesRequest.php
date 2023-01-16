<?php

namespace Ssitdikov\MediascoutApiClient\Request\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Creative\GetCreativesResponse;

class GetCreativesRequest implements MediascoutApiRequestInterface
{
    private Creative $creative;

    /**
     * @param Creative $creative
     */
    public function __construct(Creative $creative)
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
            'json' => $this->creative,
        ];
    }

    public function getResultObject(): string
    {
        return GetCreativesResponse::class;
    }
}
