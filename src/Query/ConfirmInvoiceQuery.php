<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class ConfirmInvoiceQuery
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function serialize()
    {
        return [
            'id' => $this->id
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}