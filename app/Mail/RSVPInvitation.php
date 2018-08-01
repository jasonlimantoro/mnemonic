<?php

namespace App\Mail;

use App\Event;
use App\RSVP;
use App\PackageSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RSVPInvitation extends Mailable
{
	use Queueable, SerializesModels;
	
	public $rsvp;

    /**
     * Create a new message instance.
     *
     * @param RSVP $rsvp
     */
    public function __construct(RSVP $rsvp)
    {
		$this->rsvp = $rsvp;
    }

    /**
     * Build the message.
     *
     * @param PackageSetting $setting
     * @return $this
     */
    public function build(PackageSetting $setting)
    {
		$url = '/';
		if($this->rsvp->token()->exists()) {
			$url = route('rsvps.confirm', ['rsvp' => $this->rsvp->id, 'token' => $this->rsvp->token->token ]);
		}

		$mode = $setting->getJSONValueFromKeyField('other', 'mode');

		$event = Event::{$mode}();

		if ($mode === 'birthday'){

		    $vip = $setting->getJSONValueFromKeyField('other', 'vip')->birthday_person;

		    return $this->subject("Invitation to " . $vip->name . "'s birthday party" )
                        ->markdown('emails.birthday.RSVPInvitation')
                        ->with(compact('vip', 'url', 'event'));
        }

        $hm = Event::holyMatrimony();

		$groom = $setting->getJSONValueFromKeyField('other', 'vip')->groom;

		$bride = $setting->getJSONValueFromKeyField('other', 'vip')->bride;

		return $this->subject('Invitation to Wedding of ' . $groom->name . ' and ' . $bride->name)
					->view('emails.wedding.RSVPInvitation')
					->with(compact('groom', 'bride', 'url', 'event', 'hm'));
    }
}
