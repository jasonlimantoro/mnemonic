<?php

namespace App\Traits;


trait IndexesJson
{
    /**
     * Retrieve the JSON Value given key
     *
     * @param string $keyField
     * @param string $keyJson
     * @return string
     */

    public static function getJSONValueFromKeyField(string $keyField, string $keyJson)
    {
        $json = static::getValueByKey($keyField);
        return optional($json)->$keyJson;
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
}
