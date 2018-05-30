<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class Setting extends Model
{
    /**
     * Timestamp is not needed
     *
     * @var bool
     */
	public $timestamps = false;

	public function getValueAttribute($value)
	{
		return json_decode($value);
	}

	public function setValueAttribute($value)
	{
		$this->attributes['value'] = json_encode($value);
	}
    /**
     *  Retrieve the record given the key
     *
     * @param string $key
     * @return Setting|\Illuminate\Database\Eloquent\Model|null
     */
    public static function byKey($key)
   	{
	   return static::where('key', $key)->first();
   	}

    /**
     * Retrieve the record's value
     *
     * @return mixed
     */
    public function getValue()
   	{
	   return $this->value;
   	}

    /**
     * Retrieve the value of the record given the key
     *
     * @param string $key
     * @return mixed
     */
    public static function getValueByKey($key)
   	{
        return optional(static::byKey($key))->getValue();
	}

    /**
     * Retrieve the value of the record given many keys
     *
     * @param array $keys
     * @return array
     */

	public static function getManyValueByKeys(array $keys)
	{
		return static::whereIn('key', $keys)
					->pluck('value', 'key')
					->toArray();
	}

    /**
     * Retrieve the JSON Value given key
     *
     * @param string $keyField
     * @param string $keyJSON
     * @return string
     */

	public static function getJSONValueFromKeyField(string $keyField, string $keyJSON)
	{
		$json = static::getValueByKey($keyField);
		return optional($json)->$keyJSON;
	}

	/**
	 * Update the JSON Value given the key
	 * 
	 * @param string $keyField
	 * @param array $attributes
	 * @return void
	 */

	public static function updateJSONValueFromKeyField(string $keyField, array $attributes)
	{
		foreach ($attributes as $key => $value) {
			static::byKey($keyField)->update(["value->${key}" => $value]);
		}
	}


    /**
     *  Update the value field
     *
     * @param mixed $value
     * @return bool
     */
    public function updateValue($value)
   	{
	   return $this->update(['value' => $value]);
   	}

    /**
     *  Update the record, given key, with the value
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public static function updateValueByKey(string $key, $value)
   	{
		if(!$updated = optional(static::byKey($key))->update(['value' => $value])){
			return static::create([
				'name' => title_case(preg_replace('/-/', ' ', $key)),
				'key' => $key,
				'value' => $value
			]);
		}
		return $updated;
	}

	/**
	 *	Update many records, given the attributes 
	 *  
	 * @param array $attributes
	 * @return mixed
	 */

	public static function updateManyByKeys(array $attributes)
	{
		foreach ($attributes as $key => $value) {
			static::updateValueByKey($key, $value);
		}
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
