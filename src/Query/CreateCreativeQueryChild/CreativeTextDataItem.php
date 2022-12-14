<?php

declare(strict_types=1);

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


    public function serialize(): array
    {
        return [
            'textData' => $this->textData
        ];
    }

    public function __serialize(): array
    {
        return $this->serialize();
    }
}
