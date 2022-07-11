<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    use \Laravel\Scout\Searchable;

    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];
}
