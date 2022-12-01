<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;

class FinalContract extends CreateFinalContractQuery
{
    private string $id;
    private string $status;

    /**
     * FinalContract constructor.
     * @param string $number
     * @param string $date
     * @param bool $vatIncluded
     * @param string $clientId
     * @param string $type
     */
    public function __construct(string $number, string $date, bool $vatIncluded, string $clientId, string $type)
    {
        parent::__construct($number, $date, $vatIncluded, $clientId, $type);
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return FinalContract
     */
    public function setId(string $id): FinalContract
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return FinalContract
     */
    public function setStatus(string $status): FinalContract
    {
        $this->status = $status;
        return $this;
    }

    public function unserialize($data)
    {
//        var_dump($data);
//        die();
//        [$id, $status, $number, $date, $amount, $vatIncluded, $clientId, $type, $subjectType, $actionType, $parentMainContractId] =
//            unserialize(
//                $data,
//                false
//            );
//        $this->setId($id);
//        $this->setStatus($status);
//        $this->setNumber($number);
//        $this->setDate($date);
//        $this->setAmount($amount);
//        $this->setVatIncluded($vatIncluded);
//        $this->setClientId($clientId);
//        $this->setType($type);
//        $this->setSubjectType($subjectType);
//        $this->setActionType($actionType);
//        $this->setParentMainContractId($parentMainContractId);
    }
}
