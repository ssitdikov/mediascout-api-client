<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;

class ConfirmInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            return new self();
        } catch (Exception $exception) {
        }
    }
}
