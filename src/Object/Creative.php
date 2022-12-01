<?php

namespace Ssitdikov\MediascoutApiClient\Object;

use Ssitdikov\MediascoutApiClient\Query\CreativeQuery;

class Creative extends CreativeQuery
{
    private string $id;

    private string $status;

    public function __construct(string $initialContractId, string $finalContractId, string $type, string $form, string $advertiserUrl)
    {
        parent::__construct($initialContractId, $finalContractId, $type, $form, $advertiserUrl);
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
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}