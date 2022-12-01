<?php

namespace Ssitdikov\MediascoutApiClient\Response;

use Ssitdikov\MediascoutApiClient\Exception\NotHostFoundException;
use Ssitdikov\MediascoutApiClient\Object\FinalClient;
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
//            var_dump($response);
//            die();
            $result = json_decode($response, true, 2, JSON_THROW_ON_ERROR);
//            var_dump($result);
//            die();
            $finalContract = new FinalContract($result['Number'], $result['Date'], $result['VatIncluded'], $result['ClientId'], $result['Type']);
//            $decoded = json_decode(base64_decode($result->data), false, 32, JSON_THROW_ON_ERROR);
//            var_dump($finalContract);
//            $finalContract->unserialize($result);
            $finalContract->setId($result['Id']);
            $finalContract->setStatus($result['Status']);
            $finalContract->setAmount($result['Amount']);
            $finalContract->setSubjectType($result['SubjectType'] ?? '');
            $finalContract->setActionType($result['ActionType'] ?? '');
            $finalContract->setParentMainContractId($result['ParentMainContractId'] ?? '');
            return new self($finalContract);
//            var_dump($finalContract);
//            var_dump($result);
//            die();
        } catch (\Exception $exception) {
            throw new \Exception(
                sprintf('Create new exception for error %s', $exception->getMessage())
            );
        }
        throw new NotHostFoundException('Host not found');
    }
}
