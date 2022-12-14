<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

use DateTime;
use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceInitialContractItem;
use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceStatisticsByPlatformsItem;

class CreateInvoiceQuery
{
    private string $number;

    private string $date;

    private string $clientRole;

    private string $contractorRole;

    private int $amount;

    private bool $vatIncluded;

    private string $startDate;

    private string $endDate;

    private string $finalContractId;

    private array $initialContractsData = [];

    private array $statisticsByPlatforms = [];

    public function __construct(
        string $number,
        string $clientRole,
        string $contractorRole,
        int $amount,
        bool $vatIncluded,
        string $finalContractId
    ) {
        $this->number = $number;
        $this->clientRole = $clientRole;
        $this->contractorRole = $contractorRole;
        $this->amount = $amount;
        $this->vatIncluded = $vatIncluded;
        $this->finalContractId = $finalContractId;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param DateTime $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @param array $initialContractsData
     */
    public function setInitialContractsData(InvoiceInitialContractItem $initialContractItem): void
    {
        $this->initialContractsData[0] = $initialContractItem->serialize();
    }


    /**
     * @param array $statisticsByPlatforms
     */
    public function setStatisticsByPlatforms(InvoiceStatisticsByPlatformsItem $statisticsByPlatforms): void
    {
        $this->statisticsByPlatforms[0] = $statisticsByPlatforms->serialize();
    }

    public function serialize()
    {
        return [
            'number' => $this->number,
            'date' => $this->date,
            'clientRole' => $this->clientRole,
            'contractorRole' => $this->contractorRole,
            'amount' => $this->amount,
            'vatIncluded' => $this->vatIncluded,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'finalContractId' => $this->finalContractId,
            'initialContractsData' => $this->initialContractsData,
            'statisticsByPlatforms' => $this->statisticsByPlatforms
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
