<?php

namespace App\Exceptions;

use Exception;

class CyberException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }

    public function getMessage()
    {
        return $this->message;
    }
}