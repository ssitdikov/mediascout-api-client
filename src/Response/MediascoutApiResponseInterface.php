<?php

namespace Ssitdikov\MediascoutApiClient\Response;

interface MediascoutApiResponseInterface
{

    public static function init(string $response): self;
}
