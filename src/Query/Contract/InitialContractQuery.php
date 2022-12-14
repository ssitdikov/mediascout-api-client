<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Query\Contract;

class InitialContractQuery extends AbstractContractQuery
{
    private string $finalContractId;
    private string $contractorId;

    /**
     * @return string
     */
    public function getFinalContractId(): string
    {
        return $this->finalContractId;
    }

    /**
     * @return string
     */
    public function getContractorId(): string
    {
        return $this->contractorId;
    }
}
