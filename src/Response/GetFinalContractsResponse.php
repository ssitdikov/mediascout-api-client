<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Exception;
use Ssitdikov\MediascoutApiClient\Object\FinalContract;

class GetFinalContractsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var FinalContract[] $contracts
     */
    private array $contracts;

    public static function init(array $response):  MediascoutApiResponseInterface
    {
        try {
            $contracts = new self();
            if (count($response) > 0) {
                foreach ($response as $contract) {
                    $finalContract = new FinalContract(
                        $contract['Number'],
                        new DateTime($contract['Date']),
                        $contract['VatIncluded'],
                        $contract['ClientId'],
                        $contract['Type']
                    );
                    $finalContract->setId($contract['Id']);
                    $finalContract->setStatus($contract['Status']);
                    $finalContract->setAmount($contract['Amount']);
                    $finalContract->setSubjectType($contract['SubjectType']);
                    $finalContract->setActionType($contract['ActionType']);
                    $finalContract->setParentMainContractId($contract['ParentMainContractId']);
                    $contracts->contracts[] = $finalContract;
                }
            }
            return $contracts;
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
    }
}
