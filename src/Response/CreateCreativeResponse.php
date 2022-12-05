<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\CreateCreativeObject;
use Ssitdikov\MediascoutApiClient\Exception\{HostNotFoundException};

class CreateCreativeResponse implements MediascoutApiResponseInterface
{

    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $creative = new CreateCreativeObject($result['id']);
            return new self();
        } catch (\Exception $exception) {
            throw new HostNotFoundException();
        }
    }
}