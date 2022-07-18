<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:m:s',
        'updated_at'        => 'datetime:Y-m-d H:m:s',
    ];
}
