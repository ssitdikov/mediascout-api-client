<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

use DateTime;

class CreateFinalContractQuery
{
    private string $number;
    private DateTime $date;
    private float $amount = 0;
    private bool $vatIncluded;
    private string $clientId;
    private string $type;
    private string $subjectType = '';
    private string $actionType = '';
    private string $parentMainContractId = '';

    /**
     * CreateFinalContractQuery constructor.
     * @param string $number
     * @param DateTime $date
     * @param bool $vatIncluded
     * @param string $clientId
     * @param string $type
     */
    public function __construct(string $number, DateTime $date, bool $vatIncluded, string $clientId, string $type)
    {
        $this->number = $number;
        $this->date = $date;
        $this->vatIncluded = $vatIncluded;
        $this->clientId = $clientId;
        $this->type = $type;
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
     * @return CreateFinalContractQuery
     */
    public function setNumber(string $number): CreateFinalContractQuery
    {
        $this->number = $number;
        return $this;
    }


    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return CreateFinalContractQuery
     */
    public function setDate(DateTime $date): CreateFinalContractQuery
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return CreateFinalContractQuery
     */
    public function setAmount(float $amount): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setVatIncluded(bool $vatIncluded): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setClientId(string $clientId): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setType(string $type): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setSubjectType(string $subjectType): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setActionType(string $actionType): CreateFinalContractQuery
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
     * @return CreateFinalContractQuery
     */
    public function setParentMainContractId(string $parentMainContractId): CreateFinalContractQuery
    {
        $this->parentMainContractId = $parentMainContractId;
        return $this;
    }

    public function serialize(): array
    {
        return
            [
                'number' => $this->getNumber(),
                'date' => $this->getDate()->format("Y-m-d"),
                'vatIncluded' => $this->isVatIncluded(),
                'clientId' => $this->getClientId(),
                'type' => $this->getType(),
                'amount' => $this->getAmount(),
                'subjectType' => $this->getSubjectType(),
                'actionType' => $this->getActionType(),
                'parentMainContractId' => $this->getParentMainContractId()
            ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
