<?php

namespace App\Traits;


trait Filterable
{
    /**
     * @param $query
     * @param array $filters
     * @param string $nameColumn
     *
     * @return null | \Illuminate\Database\Eloquent\Collection
     */
    public function scopeFiltersSearch($query, array $filters, $nameColumn = 'name')
	{
		if (!$filters) return null;
		$method = $filters['method'];
		$order = $filters['order'];
		$search = $filters['search'];
		return $query->orderBy($order, $method)
             ->where($nameColumn, 'like', '%' . $search . '%');
	}
}
