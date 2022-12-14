<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient;

class ApiResponseSerializer
{
    final public static function serialize(string $response, string $className)
    {
        $response_object = json_decode($response, true, 16, JSON_THROW_ON_ERROR);
        return call_user_func([$className, 'init'], $response_object);
    }
}
