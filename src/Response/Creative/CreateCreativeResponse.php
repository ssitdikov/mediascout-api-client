<?php

namespace Ssitdikov\MediascoutApiClient\Response\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class CreateCreativeResponse implements MediascoutApiResponseInterface
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

    public static function init(array $response): MediascoutApiResponseInterface
    {
        try {
            $creative = (new Creative())->setId($response['id'])->setErid($response['erid']);
            return new self($creative);
        } catch (\Exception $exception) {
            throw new \Exception('CreativeCreateException: ' . $exception->getMessage());
        }
    }
}
