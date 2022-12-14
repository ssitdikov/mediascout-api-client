<?php

namespace Ssitdikov\MediascoutApiClient\Query\queryChild;

class InvoiceInitialContractItem
{
    private string $initialContractId;

    private int $amount;

    private bool $vatIncluded;

    public function __construct(string $initialContractId, int $amount, bool $vatIncluded)
    {
        $this->initialContractId = $initialContractId;
        $this->amount = $amount;
        $this->vatIncluded = $vatIncluded;
    }

    public function serialize()
    {
        return [
            'initialContractId' => $this->initialContractId,
            'amount' => $this->amount,
            'vatIncluded' => $this->vatIncluded
        ];
    }
    public function __serialize(): array
    {
        return $this->serialize();
    }
}
