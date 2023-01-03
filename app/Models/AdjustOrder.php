<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjustOrder extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    /**
     * 項目
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany(AdjustOrderItem::class);
    }

    public function customer_manufacturer()
    {
        return $this->belongsTo(CustomerManufacturer::class, 'customer_manufacturer_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * 暫時用的欄位
     * ex: 因為這邊應該要連動前台的創建者 不是後台的創建者
     *
     * @return void
     */
    public function creator()
    {
        return $this->belongsTo(Staff::class, $this->getCreatedByColumn());
    }
}
