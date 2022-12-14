<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\PingAuthQuery;
use Ssitdikov\MediascoutApiClient\Response\PingAuthResponse;

class PingAuthRequest implements MediascoutApiRequestInterface
{
    public function getRoute(): string
    {
        return '/PingAuth';
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
        return PingAuthResponse::class;
    }
}
