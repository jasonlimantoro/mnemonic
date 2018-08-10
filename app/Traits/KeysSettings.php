<?php

namespace App\Traits;


trait KeysSettings
{

    /**
     * Retrieve the model given the key
     *
     * @param $key
     * @return mixed
     */
    public static function byKey($key)
    {
        return static::where('key', $key)->first();
    }

    /**
     * Retrieve the value field given key
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function getValueByKey($key, $default = null)
    {
        if (!$value = static::byKey($key)->value){
            return $default;
        }
        return $value;
    }

    /**
     * Update the value field
     *
     * @param $value
     * @return mixed
     */
    public function updateValue($value)
    {
        return $this->update(['value' => $value]);
    }

    /**
     * Update the value field given the key
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function updateValueByKey($key, $value)
    {
        return static::byKey($key)->updateValue($value);
    }


    /**
     * Retrieve values from many keys
     *
     * @param array $keys
     * @return mixed
     */
    public static function getValueByManyKeys(array $keys)
    {

        return static::whereIn('key', $keys)
                     ->pluck('value', 'key')
                     ->toArray();
    }

    /**
     * Update value field for many keys
     *
     * @param $keyValuePairs
     * @return array
     */
    public static function updateManyValuesByKeys($keyValuePairs)
    {
        $instances = [];
        foreach ($keyValuePairs as $key => $value) {
            $instances[] = static::updateValueByKey($key, $value);
        }

        return $instances;
    }
}
