<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\CreateInvoiceObject;

class CreateInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $createInvoice = new CreateInvoiceObject($result['id']);
            return new self($createInvoice);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
