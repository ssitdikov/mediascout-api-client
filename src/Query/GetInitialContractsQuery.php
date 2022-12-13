<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class GetInitialContractsQuery
{
    private string $initialContractId = '';
    private string $finalContractId = '';
    private string $contractorId = '';
    private string $clientId = '';
    private string $status = '';

    /**
     * @return string
     */
    public function getInitialContractId(): string
    {
        return $this->initialContractId;
    }

    /**
     * @param string $initialContractId
     * @return GetInitialContractsQuery
     */
    public function setInitialContractId(string $initialContractId): GetInitialContractsQuery
    {
        $this->initialContractId = $initialContractId;
        return $this;
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
     * @return GetInitialContractsQuery
     */
    public function setFinalContractId(string $finalContractId): GetInitialContractsQuery
    {
        $this->finalContractId = $finalContractId;
        return $this;
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
     * @return GetInitialContractsQuery
     */
    public function setContractorId(string $contractorId): GetInitialContractsQuery
    {
        $this->contractorId = $contractorId;
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
     * @return GetInitialContractsQuery
     */
    public function setClientId(string $clientId): GetInitialContractsQuery
    {
        $this->clientId = $clientId;
        return $this;
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
     * @return GetInitialContractsQuery
     */
    public function setStatus(string $status): GetInitialContractsQuery
    {
        $this->status = $status;
        return $this;
    }

    public function serialize() {
        return
            [
                'initialContractId' => $this->getInitialContractId(),
                'finalContractId' => $this->getFinalContractId(),
                'contractorId' => $this->getContractorId(),
                'clientId' => $this->getClientId(),
                'status' => $this->getStatus()
            ];

    }

    public function __serialize(): array
    {
        return $this->serialize();
    }

}
