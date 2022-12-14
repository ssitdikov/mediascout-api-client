<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Exception;
use Ssitdikov\MediascoutApiClient\Object\InitialContract;

class GetInitialContractsResponse implements MediascoutApiResponseInterface
{
    /**
     * @var InitialContract[] $contracts
     */
    private array $contracts;

    public static function init(array $response):  MediascoutApiResponseInterface
    {
        try {
            $contracts = new self();

            if (count($response) > 0) {
                foreach ($response as $contract) {
                    $initialContract = new InitialContract(
                        $contract['Number'],
                        new DateTime($contract['Date']),
                        $contract['VatIncluded'],
                        $contract['ClientId'],
                        $contract['Type'],
                        $contract['FinalContractId'],
                        $contract['ContractorId']
                    );
                    $initialContract->setId($contract['Id']);
                    $initialContract->setStatus($contract['Status']);
                    $initialContract->setAmount($contract['Amount']);
                    $initialContract->setSubjectType($contract['SubjectType']);
                    $initialContract->setActionType($contract['ActionType']);
                    $initialContract->setParentMainContractId($contract['ParentMainContractId']);
                    $contracts->contracts[] = $initialContract;
                }
            }
            return $contracts;
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
    }

    /**
     * @return array
     */
    public function getContracts(): array
    {
        return $this->contracts;
    }
}
