<?php

namespace App;

use App\Traits\FiltersResources;
use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * @mixin \Eloquent
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Model extends Eloquent
{
    use FiltersResources;

    public $filter = 'original';

    protected $guarded = [];
}
