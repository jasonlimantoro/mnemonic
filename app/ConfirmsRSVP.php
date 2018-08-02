<?php

namespace App;

use App\Mail\RSVPReservation;
use Illuminate\Support\Facades\Mail;

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

		return $this;
	}

    /**
     * Send a reservation email to RSVP
     *
     * @param RSVP $rsvp
     */
    public function reserve(RSVP $rsvp)
    {
        Mail::to($rsvp)->send(new RSVPReservation($rsvp));
	}
}
