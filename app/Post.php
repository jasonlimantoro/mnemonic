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
	// frontend
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

	public static function scopeFilterSearch($query, $filters)
	{
		if(!$filters) return;

		$method = $filters['method'];
		$order = $filters['order'];
		$search = $filters['search'];
		$query->orderBy($order, $method)
			  ->where('title', 'like', '%' . $search . '%');
	}


	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
					->groupBy('year', 'month')
					->orderByRaw('min(created_at) desc')
					->where('page_id', 1)
					->get()
					->toArray();
	}
}
