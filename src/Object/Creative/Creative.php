<?php

namespace Ssitdikov\MediascoutApiClient\Object\Creative;

use Ssitdikov\MediascoutApiClient\Types\CreativeMediaDataFileTypes;

class Creative implements \JsonSerializable
{
    private string $id = '';
    private string $creativeGroupId = '';
    private string $creativeGroupName = '';
    private string $initialContractId = '';
    private string $finalContractId;
    private string $type;
    private string $form;
    private string $advertiseUrl;
    private string $description = '';
    private string $targetAudience = '';
    private bool $isSocial = false;
    private array $codes = [];
    private array $mediaData = [];
    private array $textData = [];

    private string $erid = '';
    private array $kktuCodes = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Creative
     */
    public function setId(string $id): Creative
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreativeGroupId(): string
    {
        return $this->creativeGroupId;
    }

    /**
     * @param string $creativeGroupId
     */
    public function setCreativeGroupId(string $creativeGroupId): void
    {
        $this->creativeGroupId = $creativeGroupId;
    }

    /**
     * @return string
     */
    public function getCreativeGroupName(): string
    {
        return $this->creativeGroupName;
    }

    /**
     * @param string $creativeGroupName
     */
    public function setCreativeGroupName(string $creativeGroupName): void
    {
        $this->creativeGroupName = $creativeGroupName;
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
     * @return Creative
     */
    public function setInitialContractId(string $initialContractId): Creative
    {
        $this->initialContractId = $initialContractId;
        return $this;
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
     * @return Creative
     */
    public function setFinalContractId(string $finalContractId): Creative
    {
        $this->finalContractId = $finalContractId;
        if (!$this->initialContractId) {
            $this->setInitialContractId($finalContractId);
        }
        return $this;
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
     * @return Creative
     */
    public function setType(string $type): Creative
    {
        $this->type = $type;
        return $this;
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
     * @return Creative
     */
    public function setForm(string $form): Creative
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdvertiseUrl(): string
    {
        return $this->advertiseUrl;
    }

    /**
     * @param string $advertiseUrl
     * @return Creative
     */
    public function setAdvertiseUrl(string $advertiseUrl): Creative
    {
        $this->advertiseUrl = $advertiseUrl;
        return $this;
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
     * @return Creative
     */
    public function setDescription(string $description): Creative
    {
        $this->description = $description;
        return $this;
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
     * @return Creative
     */
    public function setTargetAudience(string $targetAudience): Creative
    {
        $this->targetAudience = $targetAudience;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSocial(): bool
    {
        return $this->isSocial;
    }

    /**
     * @param bool $isSocial
     * @return Creative
     */
    public function setIsSocial(bool $isSocial): Creative
    {
        $this->isSocial = $isSocial;
        return $this;
    }

    /**
     * @return array
     */
    public function getCodes(): array
    {
        return $this->codes;
    }

    /**
     * @param array $codes
     * @return Creative
     */
    public function setCodes(array $codes): Creative
    {
        $this->codes = $codes;
        return $this;
    }

    /**
     * @return array
     */
    public function getMediaData(): array
    {
        return $this->mediaData;
    }

    /**
     * @param array $mediaData
     * @return Creative
     */
    public function setMediaData(array $mediaData): Creative
    {
        $this->mediaData = $mediaData;
        return $this;
    }

    /**
     * @return array
     */
    public function getTextData(): array
    {
        return $this->textData;
    }

    /**
     * @param array $textData
     * @return Creative
     */
    public function setTextData(array $textData): Creative
    {
        $this->textData = $textData;
        return $this;
    }

    public function addText(string $text): Creative
    {
        $this->textData[] = [
            'TextData' => $text
        ];
        return $this;
    }

    public function addMedia(string $fileName, string $content, string $fileType, string $description = '', bool $isArchive = false): Creative
    {
        $this->mediaData[] = [
            'FileName' => $fileName,
            'FileContentBase64' => $content,
            'FileType' => $fileType,
            'IsArchive' => $isArchive,
            'Description' => $description
        ];

        return $this;
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
     * @return Creative
     */
    public function setErid(string $erid): Creative
    {
        $this->erid = $erid;
        return $this;
    }

    public function getKktuCodes(): array
    {
        return $this->kktuCodes;
    }

    public function setKktuCodes(array $kktuCodes): Creative
    {
        $this->kktuCodes = $kktuCodes;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId()
        ];
    }
}
