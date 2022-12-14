<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class GetFinalContractsQuery
{
    private string $finalContractId = '';
    private string $clientId = '';
    private string $status = '';

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }

    /**
     * @param string $finalContractId
     * @return GetFinalContractsQuery
     */
    public function setFinalContractId(string $finalContractId): GetFinalContractsQuery
    {
        $this->finalContractId = $finalContractId;
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
     * @return GetFinalContractsQuery
     */
    public function setClientId(string $clientId): GetFinalContractsQuery
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
     * @return GetFinalContractsQuery
     */
    public function setStatus(string $status): GetFinalContractsQuery
    {
        $this->status = $status;
        return $this;
    }

    public function serialize()
    {
        return
            [
                'finalContractId' => $this->getFinalContractId(),
                'clientId' => $this->getClientId(),
                'status' => $this->getStatus()
            ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
