<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query;

use DateTime;

class CreateInitialContractQuery extends CreateFinalContractQuery
{
    private string $finalContractId;
    private string $contractorId;


    /**
     * InitialContract constructor.
     * @param string $finalContractId
     * @param string $contractorId
     * @param string $number
     * @param DateTime $date
     * @param bool $vatIncluded
     * @param string $clientId
     * @param string $type
     */
    public function __construct(
        string $number,
        DateTime $date,
        bool $vatIncluded,
        string $clientId,
        string $type,
        string $finalContractId,
        string $contractorId
    ) {
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
     * @return CreateInitialContractQuery
     */
    public function setFinalContractId(string $finalContractId): CreateInitialContractQuery
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
     * @return CreateInitialContractQuery
     */
    public function setContractorId(string $contractorId): CreateInitialContractQuery
    {
        $this->contractorId = $contractorId;
        return $this;
    }

    public function serialize()
    {
        $data = parent::serialize();
        $data['finalContractId'] = $this->getFinalContractId();
        $data['contractorId'] = $this->getContractorId();

        return $data;
    }
}
