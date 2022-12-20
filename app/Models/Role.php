<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    // 搜尋器
    use \Laravel\Scout\Searchable;

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];
}
