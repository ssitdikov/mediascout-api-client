<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\GetInvoiceSummaryQuery;
use Ssitdikov\MediascoutApiClient\Response\GetInvoiceSummaryResponse;

class GetInvoiceSummaryRequest implements MediascoutApiRequestInterface
{
    private GetInvoiceSummaryQuery $getInvoiceSummaryQuery;

    public function __construct(GetInvoiceSummaryQuery $getInvoiceSummaryQuery)
    {
        $this->getInvoiceSummaryQuery = $getInvoiceSummaryQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/GetInvoiceSummary';
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
            'json' => $this->getInvoiceSummaryQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return GetInvoiceSummaryResponse::class;
    }
}
