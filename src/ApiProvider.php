<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Ssitdikov\MediascoutApiClient\Exception\ErrorResponseException;
use Ssitdikov\MediascoutApiClient\Exception\TypeErrorException;
use Ssitdikov\MediascoutApiClient\Request\Client\CreateClientRequest;
use Ssitdikov\MediascoutApiClient\Request\Client\GetClientsRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\CreateContractRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\GetContractsRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\GetInitialContractsRequest;
use Ssitdikov\MediascoutApiClient\Request\Contract\GetOuterContractsRequest;
use Ssitdikov\MediascoutApiClient\Request\Creative\CreateCreativeRequest;
use Ssitdikov\MediascoutApiClient\Request\Creative\GetCreativesRequest;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\Client\CreateClientResponse;
use Ssitdikov\MediascoutApiClient\Response\Client\GetClientsResponse;
use Ssitdikov\MediascoutApiClient\Response\Contract\CreateContractResponse;
use Ssitdikov\MediascoutApiClient\Response\Contract\GetContractsResponse;
use Ssitdikov\MediascoutApiClient\Response\Contract\GetInitialContractsResponse;
use Ssitdikov\MediascoutApiClient\Response\Creative\CreateCreativeResponse;
use Ssitdikov\MediascoutApiClient\Response\Creative\GetCreativesResponse;
use Ssitdikov\MediascoutApiClient\Response\ErrorResponse;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;
use TypeError;

/**
 * @method GetClientsResponse getClients(GetClientsRequest $request)
 * @method CreateClientResponse createClient(CreateClientRequest $request)
 * @method CreateContractResponse createContract(CreateContractRequest $request)
 * @method GetContractsResponse getContracts(GetContractsRequest $request)
 * @method GetInitialContractsResponse getInitialContracts(GetInitialContractsRequest $request)
 * @method CreateCreativeResponse createCreative(CreateCreativeRequest $request)
 * @method GetCreativesResponse getCreatives(GetCreativesRequest $request)
 * @method GetContractsResponse getOuterContracts(GetOuterContractsRequest $request)
 */
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
        } catch (BadResponseException $exception) {
            $result = $exception->getResponse()->getBody()->getContents();
            $message = json_decode(
                $result,
                true,
                16,
                JSON_THROW_ON_ERROR
            );
            if (isset($message['ErrorItems'])) {
                throw new ErrorResponseException($result);
            }
            if (isset($message['detail'])) {
                throw new ErrorResponseException($message['detail']);
            }
            throw new \Exception($result);
        }
    }

    public function __call(string $name, array $arguments)
    {
        if ($arguments[0] instanceof MediascoutApiRequestInterface) {
            return $this->execute($arguments[0]);
        }
        throw new \Exception('Method not exists');
    }
}
