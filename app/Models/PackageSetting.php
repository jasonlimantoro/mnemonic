<?php

namespace App\Models;

use App\Traits\IndexesJson;
use App\Traits\KeysSettings;

/**
 * App\Models\PackageSetting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereValue($value)
 *
 */
class PackageSetting extends Model
{
    use KeysSettings, IndexesJson;

    public $timestamps = false;
    protected $table = 'package_settings';


    public function setValueAttribute($value)
    {
        $this->attributes['value'] = json_encode($value);
    }

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }

    public static function getFields()
    {
        return [
            'total_posts',
            'total_images',
            'total_albums',
            'total_rsvp',
            'total_rsvp_reminder',
            'mode',
        ];
    }

    public static function getResourcesLimitFields()
    {
        return [
            'total_posts',
            'total_images',
            'total_albums',
            'total_rsvp',
            'total_rsvp_reminder',
        ];
    }

    public static function getOtherFields()
    {
        return [
            'mode',
        ];
    }


    public static function getRules()
    {
        $rules = [];
        foreach (static::getFields() as $field)
        {
            $rules[$field] = 'required';
        }

        return $rules;
    }


    public static function getResourcesLimitRules()
    {
        $rules = [];
        foreach (static::getResourcesLimitFields() as $field)
        {
            $rules[$field] = 'required';
        }

        return $rules;
    }

    public static function getOtherRules()
    {
        $rules = [];
        foreach (static::getOtherFields() as $field)
        {
            $rules[$field] = 'required';
        }

        return $rules;
    }

    public static function getMode()
    {
        return static::getValueByKey('other')->mode;
    }

    public static function getVip()
    {
        return static::getValueByKey('other')->vip;
    }

    public static function updatePackage($request)
    {
        static::updateJSONValueFromKeyField('resources-limit',
            $request->only(static::getResourcesLimitFields())
        );
        static::updateJSONValueFromKeyField('other', $request->only('mode'));
    }

}
