<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query\Contract;

class AbstractContractQuery
{
    private string $number;
    private \DateTime $date;
    private int $amount;
    private bool $vatIncluded;
    private string $clientId;
    private string $type;
    private string $subjectType;
    private string $actionType;
    private string $parentMainContractId;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return AbstractContractQuery
     */
    public function setNumber(string $number): AbstractContractQuery
    {
        $this->number = $number;
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
     * @return AbstractContractQuery
     */
    public function setDate(\DateTime $date): AbstractContractQuery
    {
        $this->date = $date;
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
     * @return AbstractContractQuery
     */
    public function setAmount(int $amount): AbstractContractQuery
    {
        $this->amount = $amount;
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
     * @return AbstractContractQuery
     */
    public function setVatIncluded(bool $vatIncluded): AbstractContractQuery
    {
        $this->vatIncluded = $vatIncluded;
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
     * @return AbstractContractQuery
     */
    public function setClientId(string $clientId): AbstractContractQuery
    {
        $this->clientId = $clientId;
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
     * @return AbstractContractQuery
     */
    public function setType(string $type): AbstractContractQuery
    {
        $this->type = $type;
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
     * @return AbstractContractQuery
     */
    public function setSubjectType(string $subjectType): AbstractContractQuery
    {
        $this->subjectType = $subjectType;
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
     * @return AbstractContractQuery
     */
    public function setActionType(string $actionType): AbstractContractQuery
    {
        $this->actionType = $actionType;
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
     * @return AbstractContractQuery
     */
    public function setParentMainContractId(string $parentMainContractId): AbstractContractQuery
    {
        $this->parentMainContractId = $parentMainContractId;
        return $this;
    }
}
