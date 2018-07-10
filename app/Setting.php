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
			]
		]);

		static::updateFaviconAndLogo($request);
	}

	public static function updateFaviconAndLogo(Request $request)
	{
        if ($favicon = $request->favicon_from_gallery) {
			$image = Image::byName($favicon);
			static::updateJSONValueFromKeyField('site-info', ['favicon' => $image->url_cache]);
		} else if ($favicon = $request->file('favicon_from_local')) {
			$faviconName = $favicon->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $favicon, $favicon->getClientOriginalName());
			$image = Image::firstOrCreate([
				'file_name' => $faviconName,
				'url_asset' => url('uploads/' . $faviconName),
				'url_cache' => url('imagecache/logo/' . $faviconName)
			]);
			static::updateJSONValueFromKeyField('site-info', ['favicon' => $image->url_cache]);
		}

        if ($logo = $request->logo_from_gallery) {
			$image = Image::byName($logo);
			static::updateJSONValueFromKeyField('site-info', ['logo' => $image->url_cache]);
		} else if ($logo = $request->file('logo_from_local')) {
			$logoName = $logo->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $logo, $logo->getClientOriginalName());
			$image = Image::firstOrCreate([
				'file_name' => $logoName,
				'url_asset' => url('uploads/' . $logoName),
				'url_cache' => url('imagecache/logo/' . $logoName)
			]);
			static::updateJSONValueFromKeyField('site-info', ['logo' => $image->url_cache]);
		}
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
