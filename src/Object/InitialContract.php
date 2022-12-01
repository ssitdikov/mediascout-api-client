<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

class InitialContract extends FinalContract
{
    private string $finalContractId;
    private string $contractorId;


    /**
     * InitialContract constructor.
     * @param string $finalContractId
     * @param string $contractorId
     * @param string $number
     * @param string $date
     * @param bool $vatIncluded
     * @param string $clientId
     * @param string $type
     */
    public function __construct(string $number, string $date, bool $vatIncluded,
        string $clientId, string $type, string $finalContractId, string $contractorId)
    {
        $this->finalContractId = $finalContractId;
        $this->contractorId = $contractorId;
        parent::__construct($number, $date, $vatIncluded, $clientId, $type);
    }

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }

    /**
     * @param string $finalContractId
     * @return InitialContract
     */
    public function setFinalContractId(string $finalContractId): InitialContract
    {
        $this->finalContractId = $finalContractId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContractorId(): string
    {
        return $this->contractorId;
    }

    /**
     * @param string $contractorId
     * @return InitialContract
     */
    public function setContractorId(string $contractorId): InitialContract
    {
        $this->contractorId = $contractorId;
        return $this;
    }

}
