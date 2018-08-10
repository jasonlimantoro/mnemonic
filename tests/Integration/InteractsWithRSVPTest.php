<?php

namespace Tests\Integration;

use App\RSVP;
use App\VIP;
use App\RSVPToken;
use Tests\TestCase;
use App\ConfirmsRSVP;
use App\Mail\RSVPInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class InteractsWithRSVPTest extends TestCase
{
    use DatabaseMigrations;

    public $confirm;

    public function setUp()
    {
        parent::setUp();
        $this->confirm = $this->app->make(ConfirmsRSVP::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInviteRSVP()
    {
        Mail::fake();

        // generate necessary data
        $rsvp = factory(RSVP::class)->states('pending')->create();
        $groom = factory(VIP::class)->states('male')->create();
        $bride = factory(VIP::class)->states('female')->create();

        // perform the invitation
        $this->confirm->invite($rsvp);

        // assert if the email was sent to given rsvp
        Mail::assertSent(RSVPInvitation::class, function ($mail) use ($rsvp, $groom, $bride) {
            $mail->build();
            return $mail->hasTo($rsvp->email) &&
                   $mail->rsvp->id === $rsvp->id &&
                   $mail->subject === 'Invitation to Wedding of ' . $groom->name . ' and ' . $bride->name;
        });
	}
	
	public function testConfirmRSVP()
	{
		// create the token and the associated rsvp record
		$token = factory(RSVPToken::class)->create();

		// perform http request
		$response = $this->get(route('rsvps.confirm', ['rsvp' => $token->rsvp->id, 'token' => $token->token]));

		// evaluate outcome
		$response->assertSuccessful();
		$this->assertDatabaseMissing('rsvp_tokens', [
			'rsvp_id' => $token->rsvp->id,
			'token' => $token->token
		]);
	}
}
