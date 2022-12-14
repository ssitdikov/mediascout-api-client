<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Object\FinalContract;

class GetFinalContractsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var FinalContract[] $contracts
     */
    private array $contracts;

    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 4, JSON_THROW_ON_ERROR);
            $contracts = new self();
            if (count($result) > 0) {
                foreach ($result as $contract) {
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
                    $finalContract->setSubjectType($contract['SubjectType'] ?? '');
                    $finalContract->setActionType($contract['ActionType'] ?? '');
                    $finalContract->setParentMainContractId($contract['ParentMainContractId'] ?? '');
                    $contracts->contracts[] = $finalContract;
                }
            }
            return $contracts;
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new NotHostFoundException('Host not found');
    }
}
