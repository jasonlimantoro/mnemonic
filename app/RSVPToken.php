<?php

namespace App;

use App\RSVP; 
use App\Mail\RSVPInvitation;

class RSVPToken extends Model
{
	protected $table = 'rsvp_tokens';

	public static function generateFor(RSVP $rsvp)
	{
		return static::create([
			'rsvp_id' => $rsvp->id,
			'token' => str_random(50)
		]);
	}

	public function send()
	{
		\Mail::to($this->rsvp)
			->send(new RSVPInvitation($this->rsvp));
	}

	
	public function getRouteKeyName()
	{
		return 'token';	
	}

	public function rsvp()
	{
		return $this->belongsTo(RSVP::class);
	}
}