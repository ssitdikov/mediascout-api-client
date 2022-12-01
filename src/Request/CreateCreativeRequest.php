<?php

namespace Ssitdikov\MediascoutApiClient\Request;
use Ssitdikov\MediascoutApiClient\Query\CreativeQuery;

class CreateCreativeRequest implements MediascoutApiRequestInterface
{
    private CreativeQuery $creativeQuery;

    public function __construct(CreativeQuery $creativeQuery)
    {
        $this->creativeQuery = $creativeQuery;
    }

    public function getRoute(): string
    {
        return '/Creatives/CreateCreative';
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_POST;
    }

    public function getHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    public function getParams(): array
    {
//        print(json_encode($this->creativeQuery->serialize(), JSON_UNESCAPED_UNICODE)) . "\n";
//        print "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\n";
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->creativeQuery->serialize(),
        ];
    }

    public function getResultObject(): string
    {
        return CreateCreativeRequest::class;
    }
}