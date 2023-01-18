<?php

namespace Ssitdikov\MediascoutApiClient\Query\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;

class GetCreativeQuery implements \JsonSerializable
{
    private Creative $creative;

    /**
     * @param Creative $creative
     */
    public function __construct(Creative $creative)
    {
        $this->creative = $creative;
    }

    /**
     * @return Creative
     */
    public function getCreative(): Creative
    {
        return $this->creative;
    }

    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'CreativeId' => $this->creative->getId()
            ]
        );
    }

}
