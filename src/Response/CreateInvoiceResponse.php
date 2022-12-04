<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\CreateInvoiceObject;

class CreateInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $createInvoice = new CreateInvoiceObject($result['id']);
            return $result;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}