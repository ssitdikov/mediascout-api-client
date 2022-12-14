<?php

namespace Ssitdikov\MediascoutApiClient;

use GuzzleHttp\Client;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class ApiProvider
{
    private Client $client;
    private string $endpointUrl;

    private array $headers;

    /**
     * @param string $endpointUrl
     */
    public function __construct(string $endpointUrl, string $login, string $password)
    {
        $this->client = new Client([
            'auth' => [$login, $password]
        ]);
        $this->endpointUrl = rtrim($endpointUrl, '/');
    }

    public function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;
        return $this;
    }

    final public function execute(
        MediascoutApiRequestInterface $request
    ): MediascoutApiResponseInterface {
        try {
            $response = $this->client->request(
                $request->getHttpMethod(),
                $this->endpointUrl . $request->getRoute(),
                $request->getParams()
            )->getBody();
            return ApiResponseSerializer::serialize($response, $request->getResultObject());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
