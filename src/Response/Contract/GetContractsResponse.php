<?php

namespace Ssitdikov\MediascoutApiClient\Response\Contract;

use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class GetContractsResponse implements MediascoutApiResponseInterface
{
    private array $contracts;

    public function __construct(array $contracts)
    {
        $this->contracts = $contracts;
    }

    public function getContracts(): array
    {
        return $this->contracts;
    }

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            return new self($response);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

}
