<?php

namespace App\Models;

use App\Traits\FiltersResources;
use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * App\Models\Model
 *
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 */
class Model extends Eloquent
{
    use FiltersResources;

    public $filter = 'original';

    protected $guarded = [];
}
