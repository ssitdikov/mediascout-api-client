<?php

namespace Ssitdikov\MediascoutApiClient\Object;

class Creative
{
    /**
     * @var string
     */
    private string $initialContractId;

    private string $finalContractId;

    private string $type;

    private string $form;

    private string $advertiserUrl;

    private string $description;

    private string $targetAudience;

    private bool $isSocial;

    private array $okvedCodes;

    private array $mediaData;

    private array $textData;

    public function __construct(
        string $initialContractId,
        string $finalContractId,
        string $type,
        string $form,
        string $advertiserUrl
    )
    {
        $this->initialContractId = $initialContractId;
        $this->finalContractId = $finalContractId;
        $this->type = $type;
        $this->form = $form;
        $this->advertiserUrl = $advertiserUrl;
    }

    /**
     * @return string
     */
    public function getInitialContractId(): string
    {
        return $this->initialContractId;
    }

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->form;
    }

    /**
     * @return string
     */
    public function getAdvertiserUrl(): string
    {
        return $this->advertiserUrl;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * @return string
     */
    public function getTargetAudience(): string
    {
        return $this->targetAudience;
    }

    /**
     * @return bool
     */
    public function isSocial(): bool
    {
        return $this->isSocial;
    }

    /**
     * @return array
     */
    public function getOkvedCodes(): array
    {
        return $this->okvedCodes;
    }

    /**
     * @return array
     */
    public function getMediaData(): array
    {
        return $this->mediaData;
    }

    /**
     * @return array
     */
    public function getTextData(): array
    {
        return $this->textData;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $targetAudience
     */
    public function setTargetAudience(string $targetAudience): void
    {
        $this->targetAudience = $targetAudience;
    }

    /**
     * @param bool $isSocial
     */
    public function setIsSocial(bool $isSocial): void
    {
        $this->isSocial = $isSocial;
    }

    /**
     * @param array $okvedCodes
     */
    public function setOkvedCodes(array $okvedCodes): void
    {
        $this->okvedCodes = $okvedCodes;
    }

    /**
     * @param array $mediaData
     */
    public function setMediaData(array $mediaData): void
    {
        $this->mediaData = $mediaData;
    }

    /**
     * @param array $textData
     */
    public function setTextData(array $textData): void
    {
        $this->textData = $textData;
    }
}