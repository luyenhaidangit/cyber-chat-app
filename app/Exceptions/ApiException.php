<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $errorMessage;
    protected $code;
    protected $status;
    protected $data;

    public function __construct(
        $data = null,
        $status = false,
        $code = 500,
        $errorMessage = ''
    ) {
        parent::__construct($errorMessage);
        $this->errorMessage = $errorMessage;
        $this->code = $code;
        $this->status = $status;
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function render()
    {
        return response()->json([
            'data' => $this->data,
            'status' => $this->status,
            'code' => $this->code,
            'message' => $this->errorMessage,
        ], $this->code);
    }
}