<?php

namespace App;

use App\Traits\FiltersResources;
use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * App\Model
 *
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 */
class Model extends Eloquent
{
    use FiltersResources;

    public $filter = 'original';

    protected $guarded = [];
}
