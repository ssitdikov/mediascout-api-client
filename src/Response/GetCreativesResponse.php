<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\GetCreativesObject;

class GetCreativesResponse implements MediascoutApiResponseInterface
{
    /**
     * @var GetCreativesObject $creative;
     */
    private GetCreativesObject $creative;
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $self = new self();
            $self->creative = new GetCreativesObject($result['id'], $result['status']);
            return $self;
        } catch (\Exception $exception) {
            throw new HostNotFoundException();
        }
    }
}
