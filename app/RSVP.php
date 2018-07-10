<?php

namespace App;


class RSVP extends Model
{
	protected $table = 'rsvps';

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
