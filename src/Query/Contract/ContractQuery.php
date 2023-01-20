<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query\Contract;

use Ssitdikov\MediascoutApiClient\Object\Contract\Contract;

class ContractQuery implements \JsonSerializable
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
                'number' => $this->contract->getNumber(),
                'date' => $this->contract->getDate()
                    ->setTimezone(new \DateTimeZone('Europe/Moscow'))->format("Y-m-d"),
                'vatIncluded' => $this->contract->isVatIncluded(),
                'clientId' => $this->contract->getClientId(),
                'type' => $this->contract->getType(),
                'amount' => $this->contract->getAmount(),
                'subjectType' => $this->contract->getSubjectType(),
                'actionType' => $this->contract->getActionType(),
                'parentMainContractId' => $this->contract->getParentMainContractId(),
                'contractorId' => $this->contract->getContractorId(),
                'finalContractId' => $this->contract->getFinalContractId()
            ]
        );
    }
}
