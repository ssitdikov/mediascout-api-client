<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object\Contract;

class InitialContract extends AbstractContract
{
    private string $finalContractId;
    private string $contractorId;

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }

    /**
     * @param string $finalContractId
     */
    public function setFinalContractId(string $finalContractId): void
    {
        $this->finalContractId = $finalContractId;
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
     */
    public function setContractorId(string $contractorId): void
    {
        $this->contractorId = $contractorId;
    }
}
