<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\GetCreativesObject;

class GetCreativesResponse implements MediascoutApiResponseInterface
{

    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $getCreatives = new GetCreativesObject($result['id'], $result['status']);
            return new self();
        } catch (\Exception $exception) {
            throw new HostNotFoundException();
        }
    }
}