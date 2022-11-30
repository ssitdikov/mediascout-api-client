<?php

namespace Ssitdikov\MediascoutApiClient;

use GuzzleHttp\Client;
use Ssitdikov\MediascoutApiClient\Request\MediascoutApiRequestInterface;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class ApiProvider
{
    private Client $client;
    private string $endpointUrl;

    /**
     * @param string $endpointUrl
     */
    public function __construct(string $endpointUrl)
    {
        $this->client = new Client();
        $this->endpointUrl = $endpointUrl;
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
            // @TODO
        }
    }
}
