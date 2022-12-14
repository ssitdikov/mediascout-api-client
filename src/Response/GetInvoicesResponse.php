<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\GetInvoicesObject;

class GetInvoicesResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $response = $response[0];
            $getInvoices = new GetInvoicesObject(
                $response['Id'],
                $response['Status'],
                $response['Number'],
                $response['Date'],
                $response['ClientRole'],
                $response['ContractorRole'],
                $response['Amount'],
                $response['VatIncluded'],
                $response['StartDate'],
                $response['EndDate'],
                $response['FinalContractId'],
            );
            return new self($getInvoices);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
