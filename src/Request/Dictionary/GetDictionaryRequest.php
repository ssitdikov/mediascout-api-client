<?php

namespace Ssitdikov\MediascoutApiClient\Request\Dictionary;

use Ssitdikov\MediascoutApiClient\Query\Dictionary\GetDictionaryQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Dictionary\GetDictionaryiesResponse;

class GetDictionaryRequest implements MediascoutApiRequestInterface
{
    private GetDictionaryQuery  $dictionary;

    /**
     * @param GetDictionaryQuery $dictionary
     */
    public function __construct(GetDictionaryQuery $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function getRoute(): string
    {
        return '/dictionaries/kktu';
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_GET;
    }

    public function getHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    public function getParams(): array
    {
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->dictionary->jsonSerialize(),
        ];
    }

    public function getResultObject(): string
    {
        return GetDictionaryiesResponse::class;
    }
}
