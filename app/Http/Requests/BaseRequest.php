<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *  Determine if the current request is an update request (put | patch)
     *
     * @return bool
     */
    public function isUpdateRequest()
    {
        return $this->isMethod('put') || $this->isMethod('patch');
    }
}