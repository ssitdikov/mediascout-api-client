<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Response;

use DateTime;
use Exception;
use Ssitdikov\MediascoutApiClient\Exception\HostNotFoundException;
use Ssitdikov\MediascoutApiClient\Object\FinalContract;

class CreateFinalContractResponse implements MediascoutApiResponseInterface
{
    /**
     * @var FinalContract $contract
     */
    private FinalContract $contract;

    /**
     * CreateFinalContractResponse constructor.
     * @param FinalContract $contract
     */
    public function __construct(FinalContract $contract)
    {
        $this->contract = $contract;
    }


    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $finalContract = new FinalContract(
                $response['Number'],
                new DateTime($response['Date']),
                $response['VatIncluded'],
                $response['ClientId'],
                $response['Type']
            );
            $finalContract->setId($response['Id']);
            $finalContract->setStatus($response['Status']);
            $finalContract->setAmount($response['Amount']);
            $finalContract->setSubjectType($response['SubjectType'] ?? '');
            $finalContract->setActionType($response['ActionType'] ?? '');
            $finalContract->setParentMainContractId($response['ParentMainContractId'] ?? '');
            return new self($finalContract);
        } catch (Exception $exception) {
            throw new Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new HostNotFoundException('Host not found');
    }

    /**
     * @return FinalContract
     */
    public function getContract(): FinalContract
    {
        return $this->contract;
    }
}
