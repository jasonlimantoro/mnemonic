<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
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
		$rules = ['name' => 'required|unique:categories,name'];
		if ($this->isMethod('put') || $this->isMethod('patch'))
        {
            $rules['name'] = [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category->id)
            ];
        }
        return $rules;
    }
}
