<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class CreateContractResponse implements MediascoutApiResponseInterface
{
    private Contract $contract;

    /**
     * @param Contract $contract
     */
    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    /**
     * @return Contract
     */
    public function getContract(): Contract
    {
        return $this->contract;
    }

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $contract = (new Contract())
                ->setId($response['Id'])
                ->setNumber($response['Number'])
                ->setDate(new \DateTime($response['Date']))
                ->setClientId($response['ClientId']);
            return new self($contract);
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
    }
}
