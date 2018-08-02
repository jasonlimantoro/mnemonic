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
        $mode = $setting->getValueByKey('other')->mode;
        if ($mode === 'birthday') {
            return null;
        }
        $groom = $setting->getValueByKey('other')->vip->groom;
        $bride = $setting->getValueByKey('other')->vip->bride;
        return $this->subject('RSVP Confirmation')
                    ->view('emails.wedding.RSVPReservation')
                    ->with(compact('bride', 'groom'));
    }
}
