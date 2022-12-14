<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Exception;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\FinalContract;
use Ssitdikov\MediascoutApiClient\Object\InitialContract;

class CreateInitialContractResponse implements MediascoutApiResponseInterface
{
    /**
     * @var InitialContract|FinalContract
     */
    private InitialContract $contract;

    /**
     * CreateInitialContractResponse constructor.
     * @param InitialContract $contract
     */
    public function __construct(InitialContract $contract)
    {
        $this->contract = $contract;
    }


    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $initialContract = new InitialContract(
                $response['Number'],
                new DateTime($response['Date']),
                $response['VatIncluded'],
                $response['ClientId'],
                $response['Type'],
                $response['FinalContractId'] ?? '',
                $response['ContractorId']
            );
            $initialContract->setId($response['Id']);
            $initialContract->setStatus($response['Status']);
            $initialContract->setAmount($response['Amount']);
            $initialContract->setSubjectType($response['SubjectType'] ?? '');
            $initialContract->setActionType($response['ActionType'] ?? '');
            $initialContract->setParentMainContractId($response['ParentMainContractId'] ?? '');
            return new self($initialContract);
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new HostNotFoundException('Host not found');
    }
}
