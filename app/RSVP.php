<?php

namespace App;

use App\RSVPToken;
use App\Mail\RSVPInvitation;


class RSVP extends Model
{
	protected $table = 'rsvps';

	public static function byEmail($email)
	{
		return static::where('email', $email)->firstOrFail();
	}

	public function token()
	{
		return $this->hasOne(RSVPToken::class, 'rsvp_id');
	}

}
