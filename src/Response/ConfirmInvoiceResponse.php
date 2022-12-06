<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\ConfirmInvoiceObject;

class ConfirmInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $confirmInvoice = new ConfirmInvoiceObject();
            return new self($confirmInvoice);
        } catch (\Exception $exception) {

        }
    }
}