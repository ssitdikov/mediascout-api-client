<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Response\PingResponse;

class PingRequest implements MediascoutApiRequestInterface
{
    public function getRoute(): string
    {
        return '/Ping';
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
        return PingResponse::class;
    }
}
