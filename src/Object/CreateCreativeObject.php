<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

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
