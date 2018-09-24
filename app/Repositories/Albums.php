<?php

namespace App\Repositories;

use App\Models\Album;

class Albums 
{
    /**
     * @return Album|\Illuminate\Database\Query\Builder
     */
    public static function all()
	{
		return Album::latest();
	}

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withImages()
	{
		return Album::with('images');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withoutImages()
    {
        return Album::without('images');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function categorized()
	{
		return static::withoutImages()->where('name', '!=', 'Uncategorized');
	}


    /**
     * @return array
     */
    public static function toArray()
	{
		$array = static::all()->pluck('name', 'id')->toArray();
		$array[null] = 'Uncategorized';
		return $array;
	}

    /**
     * @return mixed
     */
    public static function filtered()
    {
        return static::categorized()->filtersSearch(request(['search', 'order', 'method']));
    }
}