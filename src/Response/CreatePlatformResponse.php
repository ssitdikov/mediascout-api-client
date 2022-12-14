<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\CreatePlatformObject;

class CreatePlatformResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $createPlatform = new CreatePlatformObject($response['id']);
            return new self($createPlatform);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
