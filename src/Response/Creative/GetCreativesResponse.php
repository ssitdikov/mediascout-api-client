<?php

namespace Ssitdikov\MediascoutApiClient\Response\Creative;

use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class GetCreativesResponse implements MediascoutApiResponseInterface
{
    private array $creatives;

    public function __construct(array $creatives)
    {
        $this->creatives = $creatives;
    }

    /**
     * Return N Erid
     * @return string
     */
    public function getErid(int $position = 0): string
    {
        return $this->creatives[$position]['erid'];
    }

    public function getCreatives(): array
    {
        return $this->creatives;
    }

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            return new self($response);
        } catch (\Exception $exception) {
        }
    }

}
