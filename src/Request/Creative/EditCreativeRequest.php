<?php

namespace Ssitdikov\MediascoutApiClient\Request\Creative;

use Ssitdikov\MediascoutApiClient\Query\Creative\EditCreativeQuery;
use Ssitdikov\MediascoutApiClient\Query\Creative\GetCreativeQuery;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Creative\EditCreativeResponse;
use Ssitdikov\MediascoutApiClient\Response\Creative\GetCreativesResponse;

class EditCreativeRequest implements MediascoutApiRequestInterface
{
    private EditCreativeQuery $creative;

    /**
     * @param EditCreativeQuery $creative
     */
    public function __construct(EditCreativeQuery $creative)
    {
        $this->creative = $creative;
    }

    public function getRoute(): string
    {
        return '/Creatives/EditCreative';
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
        return [
            'headers' => $this->getHeaders(),
            'json' => $this->creative->jsonSerialize(),
        ];
    }

    public function getResultObject(): string
    {
        return EditCreativeResponse::class;
    }
}
