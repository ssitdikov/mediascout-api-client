<?php

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\DeleteInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Response\DeleteInvoiceResponse;

class DeleteInvoiceRequest implements MediascoutApiRequestInterface
{
    private DeleteInvoiceQuery $deleteInvoiceQuery;

    public function __construct(DeleteInvoiceQuery $deleteInvoiceQuery)
    {
        $this->deleteInvoiceQuery = $deleteInvoiceQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/DeleteInvoice';
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
            'json' => $this->deleteInvoiceQuery->serialzie()
        ];
    }

    public function getResultObject(): string
    {
        return DeleteInvoiceResponse::class;
    }
}
