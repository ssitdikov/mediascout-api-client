<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Exception;
use Ssitdikov\MediascoutApiClient\Object\Contract\FinalContract;

class GetFinalContractsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var FinalContract[] $contracts
     */
    private array $contracts;

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $contracts = new self();
            if (count($response) > 0) {
                foreach ($response as $contract) {
                    $finalContract = (new FinalContract())
                        ->setNumber($contract['Number'])
                        ->setDate(new DateTime($contract['Date']))
                        ->setVatIncluded($contract['VatIncluded'])
                        ->setClientId($contract['ClientId'])
                        ->setType($contract['Type'])
                        ->setId($contract['Id'])
                        ->setStatus($contract['Status'])
                        ->setAmount((int)($contract['Amount'] * 100))
                        ->setSubjectType($contract['SubjectType'])
                        ->setActionType($contract['ActionType'])
                        ->setParentMainContractId($contract['ParentMainContractId']);
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
