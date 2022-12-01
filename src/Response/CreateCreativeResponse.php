<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\Creative;
use Ssitdikov\MediascoutApiClient\Exception\{HostNotFoundException};

class CreateCreativeResponse implements MediascoutApiResponseInterface
{

    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $creative = new Creative(
                $result['initialContractId'],
                $result['finalContractId'],
                $result['type'],
                $result['form'],
                $result['advertiserUrl']
            );
            $creative->setId($result['Id']);
            $creative->setStatus($result['Status']);
            $creative->setTextData($result['TextData']);

            return new self($creative);
        } catch (\Exception $exception) {
            throw new HostNotFoundException();
        }
    }
}