<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\CreatePlatformObject;

class CreatePlatformResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $createPlatform = new CreatePlatformObject($result['id']);
            return new self($createPlatform);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}