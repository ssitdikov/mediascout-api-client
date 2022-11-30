<?php

namespace Ssitdikov\MediascoutApiClient\Request;
use Ssitdikov\MediascoutApiClient\Query\CreativeQuery;

class CreateCreativeRequest implements MediascoutApiRequestInterface
{
    private CreativeQuery $creativeQuery;

    public function __construct(CreativeQuery $creativeQuery)
    {
        $this->creativeQuery = $creativeQuery;
    }

    public function getRoute(): string
    {
        return 'creatives/createCreative';
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
            'headers' => $this->getHeaders()
        ];
    }

    public function getResultObject(): string
    {
        return CreateCreativeRequest::class;
    }
}