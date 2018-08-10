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
        if ($this->rsvp->token()->exists()) {
            $url = route('rsvps.confirm', ['rsvp' => $this->rsvp->id, 'token' => $this->rsvp->token->token]);
        }

        $mode = $setting->getMode();

        $event = Event::{$mode}();

        $hm = Event::holyMatrimony();

        $vip = $setting->getVip();

        $subject = $mode === 'birthday' ? 'Invitation to birthday of ' . $vip->birthday_person->name :
            'Invitation to wedding of ' . $vip->groom->name . ' and ' . $vip->bride->name;

        return $this->subject($subject)
                    ->view("emails.${mode}.RSVPInvitation")
                    ->with(compact('vip', 'url', 'event', 'hm'));
    }
}
