<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object;

use DateTime;
use Ssitdikov\MediascoutApiClient\Query\CreateFinalContractQuery;

class FinalContract extends CreateFinalContractQuery
{
    private string $id;
    private string $status;

    /**
     * FinalContract constructor.
     * @param string $number
     * @param DateTime $date
     * @param bool $vatIncluded
     * @param string $clientId
     * @param string $type
     */
    public function __construct(string $number, DateTime $date, bool $vatIncluded, string $clientId, string $type)
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
}
