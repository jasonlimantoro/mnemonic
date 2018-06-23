<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use Filterable;

    protected $guarded = [];
}
