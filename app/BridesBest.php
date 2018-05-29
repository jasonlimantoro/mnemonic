<?php

namespace App;

use App\Traits\FiltersSearch;
use Illuminate\Http\Request;
use App\Filters\BridesBestFilter;

class BridesBest extends Model
{
    use FiltersSearch;
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public static function createRecord(Request $request)
	{
		$bridesBest = static::create($request->only(['name', 'testimony', 'ig_account', 'gender']));
		optional(Image::handleUpload($request, BridesBestFilter::class, 'bridesbest'))->addTo($bridesBest);
	}

	public function updateRecord(Request $request)
	{
		$this->update($request->only(['name', 'testimony', 'ig_account', 'gender']));
		optional(Image::handleUpload($request, BridesBestFilter::class, 'bridesbest'))->addTo($this);
	}
}
