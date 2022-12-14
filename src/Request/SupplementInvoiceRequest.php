<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\SupplementInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Response\SupplementInvoiceResponse;

class SupplementInvoiceRequest implements MediascoutApiRequestInterface
{
    private SupplementInvoiceQuery $supplementInvoiceQuery;

    public function __construct(SupplementInvoiceQuery $supplementInvoiceQuery)
    {
        $this->supplementInvoiceQuery = $supplementInvoiceQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/SupplementInvoice';
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
            'json' => $this->supplementInvoiceQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return SupplementInvoiceResponse::class;
    }
}
