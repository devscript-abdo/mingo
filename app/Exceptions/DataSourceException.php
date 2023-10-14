<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class DataSourceException extends Exception
{
    //
    private $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function report()
    {
        Log::error($this->errors);
    }

    public function render()
    {
        return view('errors.datasource', ['errors' => $this->errors]);
    }
}
