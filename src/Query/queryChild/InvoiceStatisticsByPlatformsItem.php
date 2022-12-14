<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query\queryChild;

use DateTime;

class InvoiceStatisticsByPlatformsItem
{
    private string $initialContractId;

    private string $erid;

    private string $platformUrl;

    private string $platformName;

    private string $platformType = 'Site';

    private bool $platformOwnedByAgency = false;

    private int $impsPlan;

    private int $impsFact;

    private string $startDatePlan;

    private string $startDateFact;

    private string $endDatePlan;

    private string $endDateFact;

    private int $amount;

    private int $price;

    private bool $vatIncluded;


    public function __construct(
        string $erid,
        string $platformUrl,
        int $impsPlan,
        int $impsFact,
        int $amount,
        int $price,
        bool $vatIncluded
    ) {
        $this->erid = $erid;
        $this->platformUrl = $platformUrl;
        $this->impsPlan = $impsPlan;
        $this->impsFact = $impsFact;
        $this->amount = $amount;
        $this->price = $price;
        $this->vatIncluded = $vatIncluded;
        $this->platformName = $this->platformUrl;
    }

    /**
     * @param string $platformName
     */
    public function setPlatformName(string $platformName): void
    {
        $this->platformName = $platformName;
    }

    /**
     * @param string $platformType
     */
    public function setPlatformType(string $platformType): void
    {
        $this->platformType = $platformType;
    }

    /**
     * @param bool $platformOwnedByAgency
     */
    public function setPlatformOwnedByAgency(bool $platformOwnedByAgency): void
    {
        $this->platformOwnedByAgency = $platformOwnedByAgency;
    }

    /**
     * @param DateTime $startDatePlan
     */
    public function setStartDatePlan(string $startDatePlan): void
    {
        $this->startDatePlan = $startDatePlan;
    }

    /**
     * @param DateTime $startDateFact
     */
    public function setStartDateFact(string $startDateFact): void
    {
        $this->startDateFact = $startDateFact;
    }

    /**
     * @param DateTime $endDatePlan
     */
    public function setEndDatePlan(string $endDatePlan): void
    {
        $this->endDatePlan = $endDatePlan;
    }

    /**
     * @param DateTime $endDateFact
     */
    public function setEndDateFact(string $endDateFact): void
    {
        $this->endDateFact = $endDateFact;
    }

    public function serialize()
    {
        return [
            'initialContractId' => $this->initialContractId,
            'erid' => $this->erid,
            'platformUrl' => $this->platformUrl,
            'platformName' => $this->platformName,
            'platformType' => $this->platformType,
            'platformOwnedByAgency' => $this->platformOwnedByAgency,
            'impsPlan' => $this->impsPlan,
            'impsFact' => $this->impsFact,
            'startDatePlan' => $this->startDatePlan,
            'startDateFact' => $this->startDateFact,
            'endDatePlan' => $this->endDatePlan,
            'endDateFact' => $this->endDateFact,
            'amount' => $this->amount,
            'price' => $this->price,
            'vatIncluded' => $this->vatIncluded
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }

    /**
     * @param string $initialContractId
     */
    public function setInitialContractId(string $initialContractId): void
    {
        $this->initialContractId = $initialContractId;
    }
}
