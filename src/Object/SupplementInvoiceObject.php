<?php

namespace Ssitdikov\MediascoutApiClient\Object;

class SupplementInvoiceObject
{
    private string $id;
    private string $status;
    private int $amount;
    private int $intitialContractsCount;
    private int $intitialContractsAmount;
    private int $creativesCount;
    private int $platformsCount;
    private int $impsFactCount;
    private int $impsPlanCount;
    private int $impsAmount;

    public function __construct(
        string $id,
        string $status,
        int $amount,
        int $intitialContractsCount,
        int $intitialContractsAmount,
        int $creativesCount,
        int $platformsCount,
        int $impsFactCount,
        int $impsPlanCount,
        int $impsAmount
    )
    {
        $this->id = $id;
        $this->status = $status;
        $this->amount = $amount;
        $this->intitialContractsCount = $intitialContractsCount;
        $this->intitialContractsAmount = $intitialContractsAmount;
        $this->creativesCount = $creativesCount;
        $this->platformsCount = $platformsCount;
        $this->impsFactCount = $impsFactCount;
        $this->impsPlanCount = $impsPlanCount;
        $this->impsAmount = $impsAmount;
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
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getIntitialContractsCount(): int
    {
        return $this->intitialContractsCount;
    }

    /**
     * @return int
     */
    public function getIntitialContractsAmount(): int
    {
        return $this->intitialContractsAmount;
    }

    /**
     * @return int
     */
    public function getCreativesCount(): int
    {
        return $this->creativesCount;
    }

    /**
     * @return int
     */
    public function getPlatformsCount(): int
    {
        return $this->platformsCount;
    }

    /**
     * @return int
     */
    public function getImpsFactCount(): int
    {
        return $this->impsFactCount;
    }

    /**
     * @return int
     */
    public function getImpsPlanCount(): int
    {
        return $this->impsPlanCount;
    }

    /**
     * @return int
     */
    public function getImpsAmount(): int
    {
        return $this->impsAmount;
    }


}