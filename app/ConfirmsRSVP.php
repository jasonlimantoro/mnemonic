<?php

namespace App;

use App\Mail\RSVPReservation;
use Illuminate\Support\Facades\Mail;

class ConfirmsRSVP
{
    /**
     * Send an invitation email to RSVP
     *
     * @param RSVP $rsvp
     */
    public function invite(RSVP $rsvp)
	{
		$this->createToken($rsvp)
			 ->send();
	}

    /**
     * Send invitation and increment the reminder count
     *
     * @param RSVP $rsvp
     */
    public function postRemind(RSVP $rsvp)
	{
		$this->invite($rsvp);

		$rsvp->increment('reminder_count');
	}

    /**
     * Generate a unique token for RSVP
     *
     * @param RSVP $rsvp
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createToken(RSVP $rsvp)
	{
		return RSVPToken::generateFor($rsvp);
	}

    /**
     * Confirm the RSVP and delete the unique token
     *
     * @param RSVPToken $token
     * @return $this
     * @throws \Exception
     */
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
