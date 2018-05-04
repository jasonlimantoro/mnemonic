<?php

namespace App\Traits;


trait FiltersSearch
{
    /**
     * @param $query
     * @param array $filters
     * @param string $nameColumn
     *
     */
    public function scopeFiltersSearch($query, array $filters, $nameColumn = 'name')
	{
		if(!$filters) return;
		$method = $filters['method'];
		$order = $filters['order'];
		$search = $filters['search'];
		return $query->orderBy($order, $method)
			   		 ->where($nameColumn, 'like', '%' . $search . '%');
	}
}
