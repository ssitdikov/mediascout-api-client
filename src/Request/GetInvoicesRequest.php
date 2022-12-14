<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetInvoicesQuery;
use Ssitdikov\MediascoutApiClient\Response\GetInvoicesResponse;

class GetInvoicesRequest implements MediascoutApiRequestInterface
{
    private GetInvoicesQuery $getInvoicesQuery;

    public function __construct(GetInvoicesQuery $getInvoicesQuery)
    {
        $this->getInvoicesQuery = $getInvoicesQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/GetInvoices';
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
            'json' => $this->getInvoicesQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return GetInvoicesResponse::class;
    }
}
