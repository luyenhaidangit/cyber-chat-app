<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $errorMessage;
    protected $description;
    protected $statusCode;

    public function __construct($errorMessage, $description, $statusCode)
    {
        parent::__construct($errorMessage);
        $this->errorMessage = $errorMessage;
        $this->description = $description;
        $this->statusCode = $statusCode;
    }

    public function render()
    {
        return response()->json([
            'data' => null,
            'status' => false,
            'code' => $this->statusCode,
            'message' => $this->errorMessage,
            'description' => $this->description,
        ], $this->statusCode);
    }
}