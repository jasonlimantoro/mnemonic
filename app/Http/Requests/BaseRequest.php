<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function isUpdateRequest()
    {
        return $this->isMethod('put') || $this->isMethod('patch');
    }
}