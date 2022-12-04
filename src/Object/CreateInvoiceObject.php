<?php

namespace Ssitdikov\MediascoutApiClient\Object;

class CreateInvoiceObject
{
    private string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }


}