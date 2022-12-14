<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\GetCreativesObject;

class GetCreativesResponse implements MediascoutApiResponseInterface
{
    /**
     * @var GetCreativesObject $creative;
     */
    private GetCreativesObject $creative;
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            
            $self = new self();
            $self->creative = new GetCreativesObject($response['id'], $response['status']);
            return $self;
        } catch (Exception $exception) {
            throw new HostNotFoundException();
        }
    }
}
