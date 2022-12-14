<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use Exception;
use Ssitdikov\MediascoutApiClient\Object\GetInvoiceSummaryObject;

class GetInvoiceSummaryResponse implements MediascoutApiResponseInterface
{
    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $getInvoiceSummary = new GetInvoiceSummaryObject(
                $response['id'],
                $response['Status'],
                $response['Amount'],
                $response['IntitialContractsCount'],
                $response['IntitialContractsAmount'],
                $response['CreativesCount'],
                $response['PlatformsCount'],
                $response['ImpsFactCount'],
                $response['ImpsPlanCount'],
                $response['ImpsAmount']
            );
            return new self($getInvoiceSummary);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
