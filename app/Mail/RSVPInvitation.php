<?php

namespace App\Mail;

use App\RSVP;
use App\Couple;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RSVPInvitation extends Mailable
{
	use Queueable, SerializesModels;
	
	public $rsvp;
	public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RSVP $rsvp, $url)
    {
		$this->rsvp = $rsvp;
		$this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$groom = Couple::where('role', 'groom')->first();
		$bride = Couple::where('role', 'bride')->first();
		return $this->subject('Invitation to Wedding of ' . $groom->name . ' and ' . $bride->name)
					->markdown('emails.RSVPInvitation')
					->with([
						'groom' => $groom,
						'bride' => $bride,
						'url' => $this->url
					]);
    }
}
