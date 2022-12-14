<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\CreatePlatformQuery;
use Ssitdikov\MediascoutApiClient\Response\CreatePlatformResponse;

class CreatePlatformRequest implements MediascoutApiRequestInterface
{
    private CreatePlatformQuery $createPlatformQuery;

    public function __construct(CreatePlatformQuery $createPlatformQuery)
    {
        $this->createPlatformQuery = $createPlatformQuery;
    }

    public function getRoute(): string
    {
        return '/Platforms/CreatePlatform';
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
            'json' => $this->createPlatformQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return CreatePlatformResponse::class;
    }
}
