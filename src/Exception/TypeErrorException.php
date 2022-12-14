<?php

declare(strict_types=1);

namespace Ssitdikov\MediascoutApiClient\Exception;

use RuntimeException;

class TypeErrorException extends RuntimeException
{
    public function __construct(string $message)
    {
        [, $error] = explode(': ', $message, 2);
        [$msg,] = explode(', called in', $error);
        $this->message = $msg;
        parent::__construct();
    }
}
