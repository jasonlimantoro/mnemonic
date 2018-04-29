<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class RSVPRequest extends BaseRequest
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
            'email' => 'required|email|unique:rsvps,email'
        ];
        if ($this->isUpdateRequest())
        {
            $rules['email'] = [
				'required',
				'email',
				Rule::unique('rsvps', 'email')->ignore($this->rsvp->id)
			];
        }

        return $rules;
    }
}
