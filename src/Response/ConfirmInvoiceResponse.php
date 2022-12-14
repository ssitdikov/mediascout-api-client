<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;

class ConfirmInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            return new self();
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
