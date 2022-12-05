<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Object\InitialContract;

class GetInitialContractsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var InitialContract[] $contracts
     */
    private array $contracts;

    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 4, JSON_THROW_ON_ERROR);
            $contracts = new self();

            if (count($result) > 0) {
                foreach ($result as $contract) {
                    $initialContract = new InitialContract(
                        $contract['Number'], new DateTime($contract['Date']), $contract['VatIncluded'],
                        $contract['ClientId'], $contract['Type'], $contract['FinalContractId'] ?? '', $contract['ContractorId']
                    );
                    $initialContract->setId($contract['Id']);
                    $initialContract->setStatus($contract['Status']);
                    $initialContract->setAmount($contract['Amount']);
                    $initialContract->setSubjectType($contract['SubjectType'] ?? '');
                    $initialContract->setActionType($contract['ActionType'] ?? '');
                    $initialContract->setParentMainContractId($contract['ParentMainContractId'] ?? '');
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
