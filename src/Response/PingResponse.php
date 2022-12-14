<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;

class PingResponse implements MediascoutApiResponseInterface
{
    private string $host;

    /**
     * @param string $host
     */
    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }


    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            foreach ($result as $row) {
                [$key, $value] = explode(':', $row);
                if ($key === 'Host') {
                    return new self($value);
                }
            }
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new HostNotFoundException('Host not found');
    }
}
