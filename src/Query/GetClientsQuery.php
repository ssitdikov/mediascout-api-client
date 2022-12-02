<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

class GetClientsQuery
{
    private string $id = '';
    private string $inn = '';
    private string $status = '';

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return GetClientsQuery
     */
    public function setId(string $id): GetClientsQuery
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @param string $inn
     * @return GetClientsQuery
     */
    public function setInn(string $inn): GetClientsQuery
    {
        $this->inn = $inn;
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
     * @return GetClientsQuery
     */
    public function setStatus(string $status): GetClientsQuery
    {
        $this->status = $status;
        return $this;
    }

    public function serialize() {
        return
            [
                'id' => $this->getId(),
                'inn' => $this->getInn(),
                'status' => $this->getStatus()
            ];

    }

    public function __serialize(): array
    {
        return $this->serialize();
    }

}
