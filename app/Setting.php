<?php

namespace App;

use Illuminate\Http\Request;



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
        return static::byKey($key)->getValue();
	}
	
	/**
	 * Retrieve the value of the record given many keys
	 * 
	 * @param array $key
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
	 * @param string $keyfield
	 * @param string $keyJson
	 * @return string
	 */

	public static function getJSONValueFromKeyField(string $keyField, string $keyJSON)
	{
		$json = static::getValueByKey($keyField);
		return $json->$keyJSON;
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
     * @return bool
     */
    public static function updateValueByKey(string $key, $value)
   	{
	   return static::byKey($key)->update(['value' => $value]);
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

	public static function onUpdate(Request $request)
	{
		static::updateValueByKey('site-info', [
            'admin-email' => $request->admin_email,
            'title' => $request->site_title,
			'description' => $request->site_description,
			'logo' => null,
			'favicon' => null,
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
			static::byKey('site-info')->update(['value->favicon' => $image->url_cache]);
		} else if ($favicon = $request->file('favicon_from_local')) {
			$faviconName = $favicon->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $favicon, $favicon->getClientOriginalName());
			$image = Image::create([
				'file_name' => $faviconName,
				'url_asset' => url('uploads/' . $faviconName),
				'url_cache' => url('imagecache/gallery/' . $faviconName)
			]);
			static::byKey('site-info')->update(['value->favicon' => $image->url_cache]);
		}

        if ($logo = $request->logo_from_gallery) {
			$image = Image::byName($logo);
			static::byKey('site-info')->update(['value->logo' => $image->url_cache]);
		} else if ($logo = $request->file('logo_from_local')) {
			$logoName = $logo->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $logo, $logo->getClientOriginalName());
			$image = Image::create([
				'file_name' => $logoName,
				'url_asset' => url('uploads/' . $logoName),
				'url_cache' => url('imagecache/gallery/' . $logoName)
			]);
			static::byKey('site-info')->update(['value->logo' => $image->url_cache]);
		}
	} 
}
