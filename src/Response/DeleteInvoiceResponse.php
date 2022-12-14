<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

class DeleteInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        return new self();
    }
}
