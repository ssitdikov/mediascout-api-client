<?php

namespace Ssitdikov\MediascoutApiClient\Query;

class CreativeQuery
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

    private object $mediaData;

    private object $textData;

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
    public function getMediaData()
    {
        return $this->getMediaData();
    }

    /**
     * @return array
     */
    public function getTextData()
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
    public function setMediaData(array $creativeMediaDataItem): void
    {
        $this->mediaData[] = new class ($creativeMediaDataItem) {

            private string $fileName;

            private string $fileContentBase64;

            private string $srcUrl;

            private string $description;

            public function __construct(array $creativeMediaDataItem)
            {
                $this->fileName = $creativeMediaDataItem['FileName'];
                $this->fileContentBase64 = $creativeMediaDataItem['FileContentBase64'];
                $this->srcUrl = $creativeMediaDataItem['SrcUrl'];
                if ($creativeMediaDataItem['Description']) {
                    $this->description = $creativeMediaDataItem['Description'];
                }
            }

            /**
             * @return string
             */
            public function getFileName(): string
            {
                return $this->fileName;
            }

            /**
             * @return string
             */
            public function getFileContentBase64(): string
            {
                return $this->fileContentBase64;
            }

            /**
             * @return string
             */
            public function getSrcUrl(): string
            {
                return $this->srcUrl;
            }

            /**
             * @return string
             */
            public function getDescription(): string
            {
                return $this->description;
            }
        };
    }


    /**
     * @param array $creativeTextDataItem
     */
    public function setTextData(array $creativeTextDataItem): void
    {
        $this->textData[] = new class($creativeTextDataItem) {

            private string $textData;

            public function __construct(array $creativeTextDataItem)
            {
                $this->textData = $creativeTextDataItem['TextData'];
            }

            /**
             * @return string
             */
            public function getTextData(): string
            {
                return $this->textData;
            }
        };
    }
}