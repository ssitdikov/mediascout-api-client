<?php

namespace Ssitdikov\MediascoutApiClient\Object;

class GetCreativesObject
{
    private string $id;

    private string $erid;

    private string $status;

    private string $initialContractId;

    private string $finalContractId;

    private string $type;

    private string $form;

    private string $advertiserUrl;

    private string $description;

    private string $targetAudience;

    private string $isSocial;

    private string $okvedCodes;

    public function __construct(string $id, string $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->form;
    }

    /**
     * @param string $form
     */
    public function setForm(string $form): void
    {
        $this->form = $form;
    }

    /**
     * @return string
     */
    public function getAdvertiserUrl(): string
    {
        return $this->advertiserUrl;
    }

    /**
     * @param string $advertiserUrl
     */
    public function setAdvertiserUrl(string $advertiserUrl): void
    {
        $this->advertiserUrl = $advertiserUrl;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTargetAudience(): string
    {
        return $this->targetAudience;
    }

    /**
     * @param string $targetAudience
     */
    public function setTargetAudience(string $targetAudience): void
    {
        $this->targetAudience = $targetAudience;
    }

    /**
     * @return string
     */
    public function getIsSocial(): string
    {
        return $this->isSocial;
    }

    /**
     * @param string $isSocial
     */
    public function setIsSocial(string $isSocial): void
    {
        $this->isSocial = $isSocial;
    }

    /**
     * @return string
     */
    public function getOkvedCodes(): string
    {
        return $this->okvedCodes;
    }

    /**
     * @param string $okvedCodes
     */
    public function setOkvedCodes(string $okvedCodes): void
    {
        $this->okvedCodes = $okvedCodes;
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
     */
    public function setFinalContractId(string $finalContractId): void
    {
        $this->finalContractId = $finalContractId;
    }

    /**
     * @return string
     */
    public function getInitialContractId(): string
    {
        return $this->initialContractId;
    }

    /**
     * @param string $initialContractId
     */
    public function setInitialContractId(string $initialContractId): void
    {
        $this->initialContractId = $initialContractId;
    }

    /**
     * @return string
     */
    public function getErid(): string
    {
        return $this->erid;
    }

    /**
     * @param string $erid
     */
    public function setErid(string $erid): void
    {
        $this->erid = $erid;
    }
}