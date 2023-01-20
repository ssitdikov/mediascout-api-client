<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request\Creative;

use Ssitdikov\MediascoutApiClient\Query\Creative\CreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Creative\CreateCreativeResponse;

class CreateCreativeRequest implements MediascoutApiRequestInterface
{
    private CreativeQuery $creativeQuery;

    public function __construct(CreativeQuery $creativeQuery)
    {
        $this->creativeQuery = $creativeQuery;
    }

    public function getRoute(): string
    {
        return '/Creatives/CreateCreative';
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
            'json' => $this->creativeQuery,
        ];
    }

    public function getResultObject(): string
    {
        return CreateCreativeResponse::class;
    }
}
