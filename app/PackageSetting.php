<?php

namespace App;


use App\Traits\KeysSettings;

class PackageSetting extends Model
{
    use KeysSettings;

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

}