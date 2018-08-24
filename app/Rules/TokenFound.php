<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\RSVPToken;
use App\Models\RSVP;

class TokenFound implements Rule
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
	   return optional($rsvp)->token !== null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'RSVP ID is invalid and/or token is not found';
    }
}
