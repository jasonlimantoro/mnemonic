<?php

namespace App\Rules;

use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;

class UniqueFileBaseName implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // if no matching name is found, passes
        return empty(preg_grep("/${value}./i", Storage::disk('uploads')->allFiles()));
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
