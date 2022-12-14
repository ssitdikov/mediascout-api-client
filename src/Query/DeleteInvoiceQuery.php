<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class DeleteInvoiceQuery
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function serialzie(): array
    {
        return [
            'id' => $this->id
        ];
    }

    public function __serialize(): array
    {
        return $this->serialzie();
    }
}
