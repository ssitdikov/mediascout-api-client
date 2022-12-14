<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\Client;

class GetClientsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var Client[] $clients
     */
    private array $clients;

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $self = new self();
            if (!empty($response)) {
                foreach ($response as $item) {
                    $client = new Client(
                        $item['CreateMode'],
                        $item['LegalForm'],
                        $item['Inn'],
                        $item['Name']
                    );
                    $client->setId($item['Id']);
                    $client->setStatus($item['Status']);
                    $client->setMobilePhone($item['MobilePhone']);
                    $client->setEpayNumber($item['EpayNumber']);
                    $client->setRegNumber($item['RegNumber']);
                    $client->setOksmNumber($item['OksmNumber']);
                    $self->clients[] = $client;
                }
            }
            return $self;
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}
