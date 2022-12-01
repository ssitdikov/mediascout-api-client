<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class GetCreativesQuery
{
    private string $creativeId;

    private string $erid;

    private string $initialContractId;

    private string $finalContractId;

    private string $status;

    /**
     * @return string
     */
    public function getCreativeId(): string
    {
        return $this->creativeId;
    }

    /**
     * @param string $creativeId
     */
    public function setCreativeId(string $creativeId): void
    {
        $this->creativeId = $creativeId;
    }

    /**
     * @return string
     */
    public function getErid(): string
    {
        return $this->erid;
    }

    /**
     * @param string $erid
     */
    public function setErid(string $erid): void
    {
        $this->erid = $erid;
    }

    /**
     * @return string
     */
    public function getInitialContractId(): string
    {
        return $this->initialContractId;
    }

    /**
     * @param string $initialContractId
     */
    public function setInitialContractId(string $initialContractId): void
    {
        $this->initialContractId = $initialContractId;
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
     */
    public function setFinalContractId(string $finalContractId): void
    {
        $this->finalContractId = $finalContractId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function serialize()
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