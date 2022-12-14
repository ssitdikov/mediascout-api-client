<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Object\Client;

class GetClientsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var Client[] $clients
     */
    private array $clients;

    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 4, JSON_THROW_ON_ERROR);
            $self = new self();
            if (count($result) > 0) {
                foreach ($result as $item) {
                    $client = new Client(
                        $item['CreateMode'] ?? '',
                        $item['LegalForm'],
                        $item['Inn'],
                        $item['Name']
                    );
                    $client->setId($item['Id']);
                    $client->setStatus($item['Status']);
                    $client->setMobilePhone($item['MobilePhone'] ?? '');
                    $client->setEpayNumber($item['EpayNumber'] ?? '');
                    $client->setRegNumber($item['RegNumber'] ?? '');
                    $client->setOksmNumber($item['OksmNumber'] ?? '');
                    $self->clients[] = $client;
                }
            }
            return $self;
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new NotHostFoundException('Host not found');
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}
