<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\CreateInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Response\CreateInvoiceResponse;

class CreateInvoiceRequest implements MediascoutApiRequestInterface
{
    private CreateInvoiceQuery $createInvoiceQuery;

    public function __construct(CreateInvoiceQuery $createInvoiceQuery)
    {
        $this->createInvoiceQuery = $createInvoiceQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/CreateInvoice';
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
        print_r($this->createInvoiceQuery->serialize());
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->createInvoiceQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return CreateInvoiceResponse::class;
    }
}