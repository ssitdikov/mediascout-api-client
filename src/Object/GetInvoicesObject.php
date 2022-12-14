<?php

namespace Ssitdikov\MediascoutApiClient\Object;

class GetInvoicesObject
{
    private string $id;

    private string $status;

    private string $number;

    private string $date;

    private string $clientRole;

    private string $contractorRole;

    private int $amount;

    private bool $vatIncluded;

    private string $startDate;

    private string $endDate;

    private string $finalContractId;


    public function __construct(
        string $id,
        string $status,
        string $number,
        string $date,
        string $clientRole,
        string $contractorRole,
        int $amount,
        bool $vatIncluded,
        string $startDate,
        string $endDate,
        string $finalContractId
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->number = $number;
        $this->date = $date;
        $this->clientRole = $clientRole;
        $this->contractorRole = $contractorRole;
        $this->amount = $amount;
        $this->vatIncluded = $vatIncluded;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->finalContractId = $finalContractId;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getClientRole(): string
    {
        return $this->clientRole;
    }

    /**
     * @return string
     */
    public function getContractorRole(): string
    {
        return $this->contractorRole;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return bool
     */
    public function isVatIncluded(): bool
    {
        return $this->vatIncluded;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }
}
