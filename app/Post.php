<?php

namespace App;
use Carbon\Carbon;


class Post extends Model
{
    public function user() { // $post->user->name
        return $this->belongsTo(User::class);
    }

    public function page() { //$post->page
        return $this->belongsTo(Page::class);
	}

	public function scopeFilter($query, $filters)
	{
		if($filters && $month = $filters['month'])
		{
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}
		if($filters && $year = $filters['year'])
		{
			$query->whereYear('created_at', $year);
		}
	}
}
