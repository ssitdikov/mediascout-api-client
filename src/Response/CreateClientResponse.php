<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Object\Client;

class CreateClientResponse implements MediascoutApiResponseInterface
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * CreateClientResponse constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $client = new Client($result['CreateMode'] ?? '', $result['LegalForm'], $result['Inn'], $result['Name']);
            $client->setId($result['Id']);
            $client->setStatus($result['Status']);
            $client->setMobilePhone($result['MobilePhone'] ?? '');
            $client->setEpayNumber($result['EpayNumber'] ?? '');
            $client->setRegNumber($result['RegNumber'] ?? '');
            $client->setOksmNumber($result['OksmNumber'] ?? '');
            return new self($client);
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new NotHostFoundException('Host not found');
    }
}
