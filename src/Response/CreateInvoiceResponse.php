<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\CreateInvoiceObject;

class CreateInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $createInvoice = new CreateInvoiceObject($response['id']);
            return new self($createInvoice);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
