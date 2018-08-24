<?php

namespace App;

use App\Mail\RSVPInvitation;
use Illuminate\Support\Facades\Mail;

/**
 * App\RSVPToken
 *
 * @property int $id
 * @property int $rsvp_id
 * @property string $token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\RSVP $rsvp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVPToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVPToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVPToken whereRsvpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVPToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVPToken whereUpdatedAt($value)
 *
 */
class RSVPToken extends Model
{
	protected $table = 'rsvp_tokens';

	protected $hidden = [
		'token'
	];

	public static function generateFor(RSVP $rsvp)
	{
		return static::updateOrCreate(
			['rsvp_id' => $rsvp->id ],
			['token' => str_random(50)]
		);
	}

	public function send()
	{
		Mail::to($this->rsvp)
			->send(new RSVPInvitation($this->rsvp));
	}

	
	public function getRouteKeyName()
	{
		return 'token';	
	}

	public function rsvp()
	{
		return $this->belongsTo(RSVP::class);
	}
}
