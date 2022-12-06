<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Object\GetInvoiceSummaryObject;

class GetInvoiceSummaryResponse implements MediascoutApiResponseInterface
{
    public static function init(string $response): self
    {
        try {
            $result = json_decode($response, true, 3, JSON_THROW_ON_ERROR);
            $getInvoiceSummary = new GetInvoiceSummaryObject(
                $result['id'],
                $result['Status'],
                $result['Amount'],
                $result['IntitialContractsCount'],
                $result['IntitialContractsAmount'],
                $result['CreativesCount'],
                $result['PlatformsCount'],
                $result['ImpsFactCount'],
                $result['ImpsPlanCount'],
                $result['ImpsAmount']
            );
            return new self($getInvoiceSummary);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}