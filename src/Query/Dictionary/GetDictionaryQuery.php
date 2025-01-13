<?php

namespace Ssitdikov\MediascoutApiClient\Query\Dictionary;

use Ssitdikov\MediascoutApiClient\Object\Dictionary\Dictionary;

class GetDictionaryQuery implements \JsonSerializable
{
    private Dictionary $dictionary;

    /**
     * @param Dictionary $dictionary
     */
    public function __construct(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @return Dictionary
     */
    public function getDictionary(): Dictionary
    {
        return $this->dictionary;
    }

    public function jsonSerialize(): array
    {
        return [];
    }
}
