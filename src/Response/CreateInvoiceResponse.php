<?php

namespace Ssitdikov\MediascoutApiClient\Response;

class CreateInvoiceResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            foreach ($result as $row) {
                [$key, $value] = explode(':', $row);
                if ($key === 'Host') {
                    return new self($value);
                }
            }
            return $result;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}