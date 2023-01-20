<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object\Contract;

use Ssitdikov\MediascoutApiClient\Types\ContractSubjectTypes;
use Ssitdikov\MediascoutApiClient\Types\ContractTypes;

class Contract implements \JsonSerializable
{
    private string $id = '';

    private string $actionType = '';
    private int $amount = 0;
    private string $clientId = '';
    private \DateTime $date;
    private string $number = '';
    private string $parentMainContractId = '';
    private string $subjectType = '';
    private string $type = '';
    private bool $vatIncluded = false;
    private string $finalContractId = '';
    private string $contractorId = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Contract
     */
    public function setId(string $id): Contract
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getActionType(): string
    {
        return $this->actionType;
    }

    /**
     * @param string $actionType
     * @return Contract
     */
    public function setActionType(string $actionType): Contract
    {
        $this->actionType = $actionType;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return Contract
     */
    public function setAmount(int $amount): Contract
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return Contract
     */
    public function setClientId(string $clientId): Contract
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Contract
     */
    public function setDate(\DateTime $date): Contract
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Contract
     */
    public function setNumber(string $number): Contract
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentMainContractId(): string
    {
        return $this->parentMainContractId;
    }

    /**
     * @param string $parentMainContractId
     * @return Contract
     */
    public function setParentMainContractId(string $parentMainContractId): Contract
    {
        $this->parentMainContractId = $parentMainContractId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubjectType(): string
    {
        return $this->subjectType;
    }

    /**
     * @param string $subjectType
     * @return Contract
     */
    public function setSubjectType(string $subjectType): Contract
    {
        $this->subjectType = $subjectType;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Contract
     */
    public function setType(string $type): Contract
    {
        $this->type = $type;
        if ($type === ContractTypes::MEDIATION_CONTRACT) {
            $this->setSubjectType(ContractSubjectTypes::MEDIATION);
            $this->setActionType('Other');
        } else {
            $this->setSubjectType(ContractSubjectTypes::DISTRIBUTION);
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function isVatIncluded(): bool
    {
        return $this->vatIncluded;
    }

    /**
     * @param bool $vatIncluded
     * @return Contract
     */
    public function setVatIncluded(bool $vatIncluded): Contract
    {
        $this->vatIncluded = $vatIncluded;
        return $this;
    }

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }

    /**
     * @param string $finalContractId
     * @return Contract
     */
    public function setFinalContractId(string $finalContractId): Contract
    {
        $this->finalContractId = $finalContractId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContractorId(): string
    {
        return $this->contractorId;
    }

    /**
     * @param string $contractorId
     * @return Contract
     */
    public function setContractorId(string $contractorId): Contract
    {
        $this->contractorId = $contractorId;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId()
        ];
    }
}
