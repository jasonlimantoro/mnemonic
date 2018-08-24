<?php

namespace App;


use App\Traits\FiltersResources;

/**
 * App\RSVP
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $table_name
 * @property int|null $total_invitation
 * @property string $status
 * @property int $reminder_count
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\RSVPToken $token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereReminderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereTotalInvitation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RSVP whereUpdatedAt($value)
 *
 */
class RSVP extends Model
{
    use FiltersResources;

	protected $table = 'rsvps';

    public function setNameAttribute($value)
    {
       $this->attributes['name'] = title_case($value);
	}

	public static function byEmail($email)
	{
		return static::where('email', $email)->firstOrFail();
	}

	public function token()
	{
		return $this->hasOne(RSVPToken::class, 'rsvp_id');
	}

	public function confirmed()
	{
		return $this->status === 'confirmed';
	}

	public function notConfirmed()
	{
		return !$this->confirmed();
	}

	public function remindedEnough()
	{
	    $allowed = PackageSetting::getValueByKey('resources-limit')->total_rsvp_reminder;
		return $this->reminder_count >= $allowed;
	}

	public function notReminded()
	{
		return !$this->remindedEnough();
	}
}
