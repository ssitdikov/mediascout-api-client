<?php

namespace Ssitdikov\MediascoutApiClient\Request;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQuery;

class CreateCreativeRequest implements MediascoutApiRequestInterface
{
    private CreateCreativeQuery $creativeQuery;

    public function __construct(CreateCreativeQuery $creativeQuery)
    {
        $this->creativeQuery = $creativeQuery;
    }

    public function getRoute(): string
    {
        return '/Creatives/CreateCreativeObject';
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
            'json' => $this->creativeQuery->serialize(),
        ];
    }

    public function getResultObject(): string
    {
        return CreateCreativeRequest::class;
    }
}