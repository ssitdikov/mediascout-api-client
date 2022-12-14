<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\GetInvoicesObject;

class GetInvoicesResponse implements MediascoutApiResponseInterface
{

    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 3, JSON_THROW_ON_ERROR);
            $result = $result[0];
            var_dump($result);
            $getInvoices = new GetInvoicesObject(
                $result['Id'],
                $result['Status'],
                $result['Number'],
                $result['Date'],
                $result['ClientRole'],
                $result['ContractorRole'],
                $result['Amount'],
                $result['VatIncluded'],
                $result['StartDate'],
                $result['EndDate'],
                $result['FinalContractId'],
            );
            return new self($getInvoices);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}