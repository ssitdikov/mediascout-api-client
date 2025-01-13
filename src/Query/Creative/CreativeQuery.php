<?php

namespace Ssitdikov\MediascoutApiClient\Query\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;

class CreativeQuery implements \JsonSerializable
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
                'initialContractId' => $this->creative->getInitialContractId(),
                'finalContractId' => $this->creative->getFinalContractId(),
                'type' => $this->creative->getType(),
                'form' => $this->creative->getForm(),
                'advertiserUrl' => $this->creative->getAdvertiseUrl(),
                'description' => $this->creative->getDescription(),
                'targetAudience' => $this->creative->getTargetAudience(),
                'isSocial' => $this->creative->isSocial(),
                'okvedCodes' => $this->creative->getCodes(),
                'mediaData' => $this->creative->getMediaData(),
                'textData' => $this->creative->getTextData(),
                'kktuCodes' => $this->creative->getKktuCodes()
            ]
        );
    }
}
