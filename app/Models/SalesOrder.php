<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $casts = [
        'sales_date'        => 'datetime:Y-m-d',
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];

    /**
     * 廠商客戶
     *
     * @return void
     */
    public function customer_manufacturer()
    {
        return $this->belongsTo(CustomerManufacturer::class, 'customer_manufacturer_id');
    }

    /**
     * 業務人員
     *
     * @return void
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * 項目
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany(SalesOrderItem::class);
    }
}
