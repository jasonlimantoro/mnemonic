<?php

namespace App;
use App\RSVP;
use App\RSVPToken;

class ConfirmsRSVP 
{
	public function invite(RSVP $rsvp)
	{
		$this->createToken($rsvp)
			 ->send();
	}

	public function postRemind(RSVP $rsvp)
	{
		$this->invite($rsvp);

		$rsvp->update(['reminder_count' => 1]);
	}
		
	protected function createToken(RSVP $rsvp)
	{
		return RSVPToken::generateFor($rsvp);
	}

	public function persist(RSVPToken $token)
	{
		$token->rsvp()
			  ->update(['status'=> 'confirmed']);
		$token->delete();
	}
}
