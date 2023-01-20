<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query\Client;

use Ssitdikov\MediascoutApiClient\Object\Client\Client;

class ClientQuery implements \JsonSerializable
{
    private Client $client;

    private string $createMode = '';

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return ClientQuery
     */
    public function setClient(Client $client): ClientQuery
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreateMode(): string
    {
        return $this->createMode;
    }

    /**
     * @param string $createMode
     * @return ClientQuery
     */
    public function setCreateMode(string $createMode): ClientQuery
    {
        $this->createMode = $createMode;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'Id' => $this->client->getId(),
                'CreateMode' => $this->getCreateMode(),
                'LegalForm' => $this->client->getLegalForm(),
                'Inn' => $this->client->getInn(),
                'Name' => $this->client->getName(),
                'MobilePhone' => $this->client->getMobilePhone(),
                'EpayNumber' => $this->client->getEpayNumber(),
                'RegNumber' => $this->client->getRegNumber(),
                'OksmNumber' => $this->client->getOksmNumber(),
                'Status' => $this->client->getStatus()
            ]
        );
    }
}
