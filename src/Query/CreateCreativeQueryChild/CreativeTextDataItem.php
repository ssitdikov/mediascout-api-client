<?php

namespace Ssitdikov\MediascoutApiClient\Query\CreateCreativeQueryChild;

class CreativeTextDataItem
{
    private string $textData;

    public function __construct(string $textData)
    {
        $this->textData = $textData;
    }

    /**
     * @return string
     */
    public function getTextData(): string
    {
        return $this->textData;
    }


    public function serialize()
    {
        return [
            'TextData' => $this->textData
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}