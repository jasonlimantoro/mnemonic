<?php

namespace App\Http\Requests;

class EventsRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'location' => 'required',
            'datetime' => 'required|date|after:today'
        ];
    }
}
