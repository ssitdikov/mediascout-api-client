<?php

namespace Ssitdikov\MediascoutApiClient\Query\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;

class GetInitialContractQuery implements \JsonSerializable
{
    private Contract $contract;
    private string $contractorInn;
    private string $clientInn;

    /**
     * @param Contract $contract
     * @param string $contractorInn
     * @param string $clientInn
     */
    public function __construct(Contract $contract, string $contractorInn = '', string $clientInn = '')
    {
        $this->contract = $contract;
        $this->contractorInn = $contractorInn;
        $this->clientInn = $clientInn;
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
                'InitialContractId' => $this->contract->getFinalContractId(),
                'ContractorInn' => $this->contractorInn,
                'ClientInn' => $this->clientInn
            ]
        );
    }

}
