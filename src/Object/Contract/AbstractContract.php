<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Object\Contract;

use Ssitdikov\MediascoutApiClient\Query\Contract\AbstractContractQuery;

class AbstractContract extends AbstractContractQuery implements ContractInterface
{
    private string $id;
    private string $status;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return AbstractContract
     */
    public function setId(string $id): AbstractContract
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
     * @return AbstractContract
     */
    public function setStatus(string $status): AbstractContract
    {
        $this->status = $status;
        return $this;
    }
}
