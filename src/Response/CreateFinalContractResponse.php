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


    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $finalContract = new FinalContract(
                $result['Number'],
                new DateTime($result['Date']),
                $result['VatIncluded'],
                $result['ClientId'],
                $result['Type']
            );
            $finalContract->setId($result['Id']);
            $finalContract->setStatus($result['Status']);
            $finalContract->setAmount($result['Amount']);
            $finalContract->setSubjectType($result['SubjectType'] ?? '');
            $finalContract->setActionType($result['ActionType'] ?? '');
            $finalContract->setParentMainContractId($result['ParentMainContractId'] ?? '');
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
