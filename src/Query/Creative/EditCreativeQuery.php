<?php

namespace Ssitdikov\MediascoutApiClient\Query\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;

class EditCreativeQuery implements \JsonSerializable
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
                'id' => $this->creative->getId(),
                'erid' => $this->creative->getErid(),
                'creativeGroupId' => $this->creative->getCreativeGroupId(),
                'creativeGroupName' => $this->creative->getCreativeGroupName(),
                'advertiserUrl' => $this->creative->getAdvertiseUrl()
            ]
        );
    }
}
