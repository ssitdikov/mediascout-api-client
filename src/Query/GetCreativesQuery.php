<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class GetCreativesQuery
{
    private string $creativeId = '';

    private string $erid = '';

    private string $initialContractId = '';

    private string $finalContractId = '';

    private string $status = '';


    /**
     * @param string $creativeId
     */
    public function setCreativeId(string $creativeId): void
    {
        $this->creativeId = $creativeId;
    }

    /**
     * @param string $erid
     */
    public function setErid(string $erid): void
    {
        $this->erid = $erid;
    }

    /**
     * @param string $initialContractId
     */
    public function setInitialContractId(string $initialContractId): void
    {
        $this->initialContractId = $initialContractId;
    }

    /**
     * @param string $finalContractId
     */
    public function setFinalContractId(string $finalContractId): void
    {
        $this->finalContractId = $finalContractId;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function serialize(): array
    {
        return [
            'creativeId' => $this->creativeId,
            'erid' => $this->erid,
            'initialContractId' => $this->initialContractId,
            'finalContractId' => $this->finalContractId,
            'status' => $this->status,
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
