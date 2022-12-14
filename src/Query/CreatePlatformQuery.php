<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class CreatePlatformQuery
{
    private string $name;
    private string $type;
    private string $url;
    private bool $is_owner;
    private string $agencyId;

    public function __construct(
        string $name,
        string $type,
        string $url,
        bool $is_owner,
        string $agencyId
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
        $this->is_owner = $is_owner;
        $this->agencyId = $agencyId;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'url' => $this->url,
            'is_owner' => $this->is_owner,
            'agencyId' => $this->agencyId
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}