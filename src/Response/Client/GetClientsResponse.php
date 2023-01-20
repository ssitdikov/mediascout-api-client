<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response\Client;

use Ssitdikov\MediascoutApiClient\Exception\ClientNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\Client\Client;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class GetClientsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var Client[] $clients
     */
    private array $clients;

    public static function init(array $response): MediascoutApiResponseInterface
    {
        $self = new self();
        if (!empty($response)) {
            foreach ($response as $item) {
                $client = (new Client($item['Name'], $item['Inn']))
                    ->setLegalForm($item['LegalForm'])
                    ->setId($item['Id']);
                $self->addClient($client);
            }
        } else {
            throw new ClientNotFoundException(
                sprintf('Client(s) not found')
            );
        }
        return $self;
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        $this->clients[$client->getInn()] = $client;
        return $this;
    }
}
