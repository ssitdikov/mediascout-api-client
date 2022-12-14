<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

use Ssitdikov\MediascoutApiClient\Query\CreateClientQuery;

class Client extends CreateClientQuery
{
    private string $id;
    private string $status;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Client
     */
    public function setId(string $id): Client
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Client
     */
    public function setStatus(string $status): Client
    {
        $this->status = $status;
        return $this;
    }
}
