<?php

namespace App;


class Setting extends Model
{
   public $timestamps = false;

   public static function byKey($key)
   {
	   return static::where('key', $key)->first();
   }

   public function getValue()
   {
	   return $this->value;
   }

   public static function getValueByKey($key)
   {
	   return static::byKey($key)->getValue();
   }

   public function updateValue($value)
   {
	   return $this->update(['value' => $value]);
   }

   public static function updateValueByKey($key, $value)
   {
	   return static::byKey($key)->update(['value' => $value]);
   }
}
