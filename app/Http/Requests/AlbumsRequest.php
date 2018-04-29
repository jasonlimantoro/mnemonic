<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class AlbumsRequest extends BaseRequest
{
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
        if ($this->isUpdateRequest())
        {
            $rules['name'] = [
				'required',
				Rule::unique('albums', 'name')->ignore($this->album->id)
			];
        }
		return $rules;
    }
}
