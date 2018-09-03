<?php

namespace App\Listeners;

use App\Models\PackageSetting;
use App\Events\ModeChanged;

class UpdatePackageSettings
{

	public $setting;

    /**
     * Create the event listener.
     *
     * @param PackageSetting $setting
     */
    public function __construct(PackageSetting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Handle the event.
     *
     * @param  ModeChanged  $event
     * @return void
     */
    public function handle(ModeChanged $event)
    {
        if($event->mode === 'birthday'){
			$this->setting->updateJSONValueFromKeyField('other', [
				'vip' => [
					'birthday_person' => [
						"name" => "Victor Immanuel Rumende, S. Kom",
						"father" => "Mr. Budi Darma",
						"mother" => "Mrs. Sandra Angelia",
						"image" => "groom.jpg",
					]
				], 
			]);
		} else {
			$this->setting->updateJSONValueFromKeyField('other', [
				'vip' => [
					'groom' => [
						"name" => "Victor Immanuel Rumende, S. Kom",
						"father" => "Mr. Budi Darma",
						"mother" => "Mrs. Sandra Angelia",
						"image" => "groom.jpg",
						"gender" => 'male',
					],
					'bride' => [
						"name" => "Lenny Kurniawati Ligadjaja, S. E",
						"father" => "Mr. Samuel Tanto",
						"mother" => "Mrs. Vina K. Dhian",
						"image" => "bride.jpg",
						"gender" => "female"
					]
				],
			]);
		}
    }
}
