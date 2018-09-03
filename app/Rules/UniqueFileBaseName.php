<?php

namespace App\Rules;

use App\Models\Image;
use Illuminate\Contracts\Validation\Rule;

class UniqueFileBaseName implements Rule
{
    public $ignoreId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($ignordId)
    {
        $this->ignoreId = $ignordId;
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
        // if no matching name is found, passes
        return !Image::where('name', 'like', "${value}.%")
                     ->where('id', '!=', $this->ignoreId)
                     ->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute must be unique!';
    }
}
