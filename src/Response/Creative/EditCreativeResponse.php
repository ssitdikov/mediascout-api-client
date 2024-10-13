<?php

namespace Ssitdikov\MediascoutApiClient\Response\Creative;

use Ssitdikov\MediascoutApiClient\Object\Creative\Creative;
use Ssitdikov\MediascoutApiClient\Response\MediascoutApiResponseInterface;

class EditCreativeResponse implements MediascoutApiResponseInterface
{
    private Creative $creative;

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
            $creative = (new Creative())->setId($response['id']);
            return new self($creative);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
