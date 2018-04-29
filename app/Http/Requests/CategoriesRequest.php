<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CategoriesRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		$rules = ['name' => 'required|unique:categories,name'];
		if ($this->isUpdateRequest())
        {
            $rules['name'] = [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category->id)
            ];
        }
        return $rules;
    }
}
