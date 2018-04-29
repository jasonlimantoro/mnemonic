<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class RSVPRequest extends BaseRequest
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
