<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceInitialContractItem;
use Ssitdikov\MediascoutApiClient\Query\queryChild\InvoiceStatisticsByPlatformsItem;

class SupplementInvoiceQuery
{
    private string $id;

    private array $initialContractsData = [];

    private array $statisticsByPlatforms = [];

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param array $initialContractsData
     */
    public function setInitialContractsData(InvoiceInitialContractItem $initialContractsData): void
    {
        $this->initialContractsData = $initialContractsData->serialize();
    }

    /**
     * @param array $statisticsByPlatforms
     */
    public function setStatisticsByPlatforms(InvoiceStatisticsByPlatformsItem $statisticsByPlatforms): void
    {
        $this->statisticsByPlatforms = $statisticsByPlatforms->serialize();
    }

    public function serialize()
    {
        return [
            'Id' => $this->id,
            'InitialContractsData' => $this->initialContractsData,
            'StatisticsByPlatforms' => $this->statisticsByPlatforms,
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
