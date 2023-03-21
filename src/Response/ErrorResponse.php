<?php

namespace Ssitdikov\MediascoutApiClient\Response;

class ErrorResponse implements MediascoutApiResponseInterface
{

    private array $errorList = [];

    /**
     * @param array $errorList
     */
    public function __construct(array $errorList)
    {
        $this->errorList = $errorList;
    }

    public static function init(array $response): MediascoutApiResponseInterface
    {
        return new self($response);
    }



}
