<?php

namespace App;

use App\Traits\FiltersResources;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use FiltersResources;

    public $filter = 'original';

    protected $guarded = [];
}
