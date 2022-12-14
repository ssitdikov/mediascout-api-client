<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Exception\{HostNotFoundException};
use Ssitdikov\MediascoutApiClient\Object\CreateCreativeObject;

class CreateCreativeResponse implements MediascoutApiResponseInterface
{
    private CreateCreativeObject $createCreativeObject;
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $self = new self();
            $self->createCreativeObject = new CreateCreativeObject($response['Id']);
            return $self;
        } catch (Exception $exception) {
            throw new HostNotFoundException();
        }
    }

    /**
     * @return CreateCreativeObject
     */
    public function getCreateCreativeObject(): CreateCreativeObject
    {
        return $this->createCreativeObject;
    }
}
