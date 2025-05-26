<?php

namespace Ssitdikov\MediascoutApiClient\Query\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;

class GetInitialContractQuery implements \JsonSerializable
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

    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'InitialContractId' => $this->contract->getFinalContractId()
            ]
        );
    }

}
