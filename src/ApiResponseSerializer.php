<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient;

class ApiResponseSerializer
{
    final public static function serialize(string $response, string $className)
    {
        $response_object = json_decode($response, true, 16, JSON_THROW_ON_ERROR);
        return \call_user_func(
            [$className, 'init'],
            array_map(
                static function ($item) {
                    if (\is_array($item)) {
                        foreach ($item as $key => $value) {
                            if ($value === null) {
                                $item[$key] = '';
                            }
                        }
                    } elseif ($item === null) {
                        $item = '';
                    }
                    return $item;
                },
                $response_object
            )
        );
    }
}
