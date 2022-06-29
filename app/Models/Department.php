<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Wildside\Userstamps\Userstamps;

class Department extends Model
{
    use HasFactory;

    use Searchable;

    use Userstamps;

    protected $guarded = [];

    protected $casts = [
        'disable_at' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
