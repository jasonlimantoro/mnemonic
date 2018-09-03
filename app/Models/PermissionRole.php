<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionRole extends Pivot
{
    public $timestamps = false;

    public $incrementing = false;

    protected $table = 'permission_role';

    protected $casts = [
        'action' => 'array'
    ];

    public function setActionAttribute($value)
    {
        $this->attributes['action'] = json_encode($value);
    }
}
