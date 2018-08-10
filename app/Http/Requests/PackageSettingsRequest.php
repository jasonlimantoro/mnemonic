<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageSettingsRequest extends FormRequest
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
        return [
            'total_posts' => 'required',
            'total_images' => 'required',
            'total_albums' => 'required',
            'total_rsvp' => 'required',
            'total_rsvp_reminder' => 'required',
            'mode' => 'required',
        ];
    }
}
