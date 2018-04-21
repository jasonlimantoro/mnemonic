<?php

namespace App\Mail;

use App\RSVP;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RSVPInvitation extends Mailable
{
	use Queueable, SerializesModels;
	
	public $rsvp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RSVP $rsvp)
    {
        $this->rsvp = $rsvp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.RSVPInvitation');
    }
}
