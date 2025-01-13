<?php

namespace Ssitdikov\MediascoutApiClient\Response\Dictionary;

use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class GetDictionaryiesResponse implements MediascoutApiResponseInterface
{
    private array $dictionaries;

    public function __construct(array $dictionaries)
    {
        $this->dictionaries = $dictionaries;
    }

    public function getDictionaries(): array
    {
        return $this->dictionaries;
    }

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            return new self($response);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
