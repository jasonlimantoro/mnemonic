<?php

namespace App\Mail;

use App\PackageSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RSVPReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $rsvp;

    /**
     * Create a new message instance.
     *
     * @param $rsvp
     */
    public function __construct($rsvp)
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
        $vip = $setting->getVip();
        return $this->subject("RSVP Confirmation")
                    ->view("emails.RSVPReservation", compact('vip'));
    }
}
