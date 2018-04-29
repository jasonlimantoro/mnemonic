<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;

class BridesBestsRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'gender' => [
                'required',
                Rule::in(['male', 'female'])
            ]
        ];

        return $rules;
    }
}
