<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\RSVP;

class Unconfirmed implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
		$rsvp = RSVP::find((int) $value);
		return optional($rsvp)->status !== 'confirmed';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'RSVP is already confirmed!';
    }
}
