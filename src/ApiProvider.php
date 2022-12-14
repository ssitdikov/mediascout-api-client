<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient;

use Exception;
use GuzzleHttp\Client;
use Ssitdikov\MediascoutApiClient\Exception\TypeErrorException;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;
use TypeError;

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

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    final public function execute(
        MediascoutApiRequestInterface $request
    ): MediascoutApiResponseInterface {
        try {
            $response = $this->client->request(
                $request->getHttpMethod(),
                $this->endpointUrl . $request->getRoute(),
                $request->getParams()
            )->getBody()->getContents();
            return ApiResponseSerializer::serialize($response, $request->getResultObject());
        } catch (TypeError $typeError) {
            throw new TypeErrorException($typeError->getMessage());
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
