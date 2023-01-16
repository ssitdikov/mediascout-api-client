<?php

namespace Ssitdikov\MediascoutApiClient\Response\Creative;

use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class GetCreativesResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        return new self();
    }

}
