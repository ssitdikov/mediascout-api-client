<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class GetInvoicesQuery
{
    private string $invoiceId = '';

    private string $finalContractId = '';

    private string $status = '';

    /**
     * @param string $invoiceId
     */
    public function setInvoiceId(string $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
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

    public function serialize()
    {
        return [
            'invoiceId' => $this->invoiceId,
            'finalContractId' => $this->finalContractId,
            'status' => $this->status,
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}