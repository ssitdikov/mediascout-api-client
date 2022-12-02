<?php

namespace Ssitdikov\MediascoutApiClient\Query;

use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild\CreativeMediaDataItem;
use Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild\CreativeTextDataItem;

class CreateCreativeQuery
{
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
        string $advertiserUrl,
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
     * @param array $creativeMediaDataItem
     */
    public function setMediaData(CreativeMediaDataItem $mediaData): void
    {
        $this->mediaData[0] = $mediaData->serialize();
    }

    /**
     * @param array $creativeTextDataItem
     */
    public function setTextData(CreativeTextDataItem $textData): void
    {
        $this->textData[0] = $textData->serialize();
    }


    public function serialize()
    {
        return [
            'initialContractId' => $this->initialContractId,
            'finalContractId' => $this->finalContractId,
            'type' => $this->type,
            'form' => $this->form,
            'advertiserUrl' => $this->advertiserUrl,
            'description' => $this->description,
            'targetAudience' => $this->targetAudience,
            'isSocial' => $this->isSocial,
            'okvedCodes' => $this->okvedCodes,
            'mediaData' => $this->mediaData,
            'textData' => $this->textData,
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}