<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Request;

use Ssitdikov\MediascoutApiClient\Query\ConfirmInvoiceQuery;
use Ssitdikov\MediascoutApiClient\Response\ConfirmInvoiceResponse;

class ConfirmInvoiceRequest implements MediascoutApiRequestInterface
{
    private ConfirmInvoiceQuery $confirmInvoiceQuery;

    public function __construct(ConfirmInvoiceQuery $confirmInvoiceQuery)
    {
        $this->confirmInvoiceQuery = $confirmInvoiceQuery;
    }

    public function getRoute(): string
    {
        return '/Invoices/ConfirmInvoice';
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
            'json' => $this->confirmInvoiceQuery->serialize()
        ];
    }

    public function getResultObject(): string
    {
        return ConfirmInvoiceResponse::class;
    }
}
