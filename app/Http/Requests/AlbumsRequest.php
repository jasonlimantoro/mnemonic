<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlbumsRequest extends FormRequest
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
            'name' => 'required|unique:albums,name',
            'description' => 'required'
        ];
        // if an update action
        if ($this->isMethod('put') || $this->isMethod('patch'))
        {
            $rules['name'] = [
				'required',
				Rule::unique('albums', 'name')->ignore($this->album->id)
			];
        }
		return $rules;
    }
}
