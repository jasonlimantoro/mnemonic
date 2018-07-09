<?php

namespace App;


class PackageSetting extends Model
{
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


    public static function byKey($key)
    {
        return static::where('key', $key)->first();
    }

    public static function getValueByKey($key)
    {
        return optional(static::byKey($key))->value;
    }

    public static function getValueByManyKeys(array $keys)
    {
        $values = [];
        foreach ($keys as $key)
        {
            $values[$key] = static::getValueByKey($key);
        }

        return $values;
    }

    public static function updateValueByKey($key, $value)
    {
        return static::byKey($key)->updateValue($value);
    }

    public function updateValue($value)
    {
        return $this->update(['value' => $value]);
    }

    public static function getFields()
    {
        return [
            'total_posts',
            'total_photos',
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
            'total_photos',
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

}
