<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class CreatePlatformQuery
{
    private string $name;
    private string $type;
    private string $url;
    private bool $isOwner;
    private string $agencyId;

    public function __construct(
        string $name,
        string $type,
        string $url,
        bool $isOwner,
        string $agencyId
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
        $this->isOwner = $isOwner;
        $this->agencyId = $agencyId;
    }

    public function serialize()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'url' => $this->url,
            'is_owner' => $this->isOwner,
            'agencyId' => $this->agencyId
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
