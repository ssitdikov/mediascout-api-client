<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

interface MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface;
}
