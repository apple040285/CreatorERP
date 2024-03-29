<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementOrderItem extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
