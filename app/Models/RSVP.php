<?php

namespace App\Models;

use App\Traits\FiltersResources;

/**
 * App\Models\RSVP
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
 * @property-read \App\Models\RSVPToken $token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereReminderCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereTotalInvitation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RSVP whereUpdatedAt($value)
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
