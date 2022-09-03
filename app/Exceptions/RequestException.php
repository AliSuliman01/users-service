<?php

namespace App\Exceptions;

use App\Helpers\Response;
use Illuminate\Http\Request;
use Exception;
use Throwable;

class RequestException extends Exception
{
    protected $detailed_error;

    public function __construct($message,$detailed_error = null, $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->detailed_error = $detailed_error;
    }

    public function render(Request $request)
    {
        return response()->json(Response::error($this->message,$this->detailed_error), $this->code);
    }
}
