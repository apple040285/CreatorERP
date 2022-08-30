<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    protected $casts = [
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];
}
