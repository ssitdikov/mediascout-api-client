<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
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


    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $client = new Client($response['CreateMode'], $response['LegalForm'], $response['Inn'], $response['Name']);
            $client->setId($response['Id']);
            $client->setStatus($response['Status']);
            $client->setMobilePhone($response['MobilePhone']);
            $client->setEpayNumber($response['EpayNumber']);
            $client->setRegNumber($response['RegNumber']);
            $client->setOksmNumber($response['OksmNumber']);
            return new self($client);
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
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
