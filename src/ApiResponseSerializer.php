<?php

namespace Ssitdikov\MediascoutApiClient;

class ApiResponseSerializer
{
    final public static function serialize(string $response, string $className)
    {
        return call_user_func([$className, 'init'], $response);
    }
}
