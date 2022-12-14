<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

interface MediascoutApiRequestInterface
{
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_GET = 'GET';

    public function getRoute(): string;

    public function getHttpMethod(): string;

    public function getHeaders(): array;

    public function getParams(): array;

    public function getResultObject(): string;
}
