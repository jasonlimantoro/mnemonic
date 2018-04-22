<?php

namespace App;

use App\RSVPToken;
use App\Mail\RSVPInvitation;


class RSVP extends Model
{
	protected $table = 'rsvps';
	
	public function invite()
	{
		$this->createToken()
			->send();
	}
		
	protected function createToken()
	{
		return RSVPToken::generateFor($this);
	}

}
