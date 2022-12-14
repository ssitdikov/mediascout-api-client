<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Exception\{HostNotFoundException};
use Ssitdikov\MediascoutApiClient\Object\CreateCreativeObject;

class CreateCreativeResponse implements MediascoutApiResponseInterface
{
    private CreateCreativeObject $createCreativeObject;
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $self = new self();
            $self->createCreativeObject = new CreateCreativeObject($result['Id']);
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
