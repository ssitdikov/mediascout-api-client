<?php

namespace Ssitdikov\MediascoutApiClient\Query\CreativeQueryChild;

class CreativeMediaDataItem
{
    private string $fileName;

    private string $fileContentBase64;

    private string $srcUrl;

    private string $description;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
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

    /**
     * @param string $fileContentBase64
     */
    public function setFileContentBase64(string $fileContentBase64): void
    {
        $this->fileContentBase64 = $fileContentBase64;
    }

    /**
     * @param string $srcUrl
     */
    public function setSrcUrl(string $srcUrl): void
    {
        $this->srcUrl = $srcUrl;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}