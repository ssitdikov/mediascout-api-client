<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
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
     * @param FinalContract|InitialContract $contract
     */
    public function __construct($contract)
    {
        $this->contract = $contract;
    }


    public static function init(string $response): MediascoutApiResponseInterface
    {
        try {
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
            $initialContract = new InitialContract(
                $result['Number'],
                new \DateTime($result['Date']),
                $result['VatIncluded'],
                $result['ClientId'],
                $result['Type'],
                $result['FinalContractId'] ?? '',
                $result['ContractorId']
            );
            $initialContract->setId($result['Id']);
            $initialContract->setStatus($result['Status']);
            $initialContract->setAmount($result['Amount']);
            $initialContract->setSubjectType($result['SubjectType'] ?? '');
            $initialContract->setActionType($result['ActionType'] ?? '');
            $initialContract->setParentMainContractId($result['ParentMainContractId'] ?? '');
            return new self($initialContract);
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new NotHostFoundException('Host not found');
    }
}
