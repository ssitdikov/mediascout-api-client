<?php

namespace Ssitdikov\MediascoutApiClient\Object;

use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQuery;

class CreateCreativeObject
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}