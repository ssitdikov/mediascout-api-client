<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\ConfirmInvoiceObject;

class ConfirmInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            return new self();
        } catch (\Exception $exception) {
        }
    }
}
