<?php

namespace App;

use App\Traits\IndexesJson;
use App\Traits\KeysSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class Setting extends Model
{
    use KeysSettings, IndexesJson;

	public $timestamps = false;

	public function getValueAttribute($value)
	{
		return json_decode($value);
	}

	public function setValueAttribute($value)
	{
		$this->attributes['value'] = json_encode($value);
	}


	public static function updateSiteInfo(Request $request)
	{
		static::updateJSONValueFromKeyField('site-info', [
            'admin-email' => $request->admin_email,
            'title' => $request->site_title,
			'description' => $request->site_description,
            'contact' => [
                'email' => $request->contact_email,
                'phone' => $request->contact_phone,
                'mobile' => $request->contact_mobile,
                'address' => $request->contact_address,
                'region' => $request->contact_region,
                'city' => $request->contact_city,
                'country' => $request->contact_country,
                'zip_code' => $request->contact_zip_code,
			],
            'logo' => $request->logo,
            'favicon' => $request->favicon
		]);
	}


	public static function updateSiteSocial($social)
	{
		static::updateValueByKey('site-social', $social);
	}

	public static function updateSiteSEO($seo)
	{
		static::updateValueByKey('site-seo', $seo);
	}
}
