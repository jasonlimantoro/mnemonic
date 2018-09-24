<?php

namespace App\Rules;

use App\Models\Image;
use Illuminate\Contracts\Validation\Rule;

class UniqueFileBaseName implements Rule
{
    public $ignoreId;

    public function __construct($ignoreID)
    {
       $this->ignoreId = $ignoreID;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // if no duplicate name is found, passes
        $duplicate = Image::where('name', 'like', $value . '.%')
                          ->where('id', '<>', $this->ignoreId)
                          ->count();
        return !$duplicate;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute already exists. Choose a different :attribute!';
    }
}
