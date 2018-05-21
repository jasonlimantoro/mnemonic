<?php

namespace App;

use App\Mail\RSVPInvitation;
use Illuminate\Support\Facades\Mail;

class RSVPToken extends Model
{
	protected $table = 'rsvp_tokens';

	protected $hidden = [
		'token'
	];

	public static function generateFor(RSVP $rsvp)
	{
		return static::updateOrCreate(
			['rsvp_id' => $rsvp->id ],
			['token' => str_random(50)]
		);
	}

	public function send()
	{
		Mail::to($this->rsvp)
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
