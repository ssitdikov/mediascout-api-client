<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response\Client;

use Ssitdikov\MediascoutApiClient\Object\Client\Client;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class CreateClientResponse implements MediascoutApiResponseInterface
{
    private Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $client = (new Client($response['Name'], $response['Inn']))
                ->setLegalForm($response['LegalForm'])
                ->setId($response['Id']);
            return new self($client);
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception with error: %s', $exception->getMessage())
            );
        }
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
