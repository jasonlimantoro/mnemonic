<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends BaseRequest
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
			'password' => 'required',
			'email' => 'required|email|unique:users,email',
			'role_id' => 'required',
		];
		if($this->isUpdateRequest()){
			unset($rules['password']);
			$rules['email'] = [
				'required',
				'email',
				Rule::unique('users', 'email')->ignore($this->user->id)
			];
		}
		
		return $rules;
    }
}
