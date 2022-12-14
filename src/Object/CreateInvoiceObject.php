<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

class CreateInvoiceObject
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
