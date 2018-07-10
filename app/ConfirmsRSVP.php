<?php

namespace App;

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

		$rsvp->increment('reminder_count');
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
