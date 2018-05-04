<?php

namespace App;


class Setting extends Model
{
    /**
     * Timestamp is not needed
     *
     * @var bool
     */
    public $timestamps = false;

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
}
