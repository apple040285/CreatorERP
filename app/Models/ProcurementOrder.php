<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementOrder extends Model
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

    // protected $with = ['purchase_orders'];

    public function customer_manufacturer()
    {
        return $this->belongsTo(CustomerManufacturer::class, 'customer_manufacturer_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function items()
    {
        return $this->hasMany(ProcurementOrderItem::class);
    }

    /**
     * 進貨單
     *
     * @return void
     */
    public function purchase_orders()
    {
        return $this->morphMany(PurchaseOrder::class, null, 'transfer_type', 'transfer_order_no');
    }

    // public function transfer()
    // {
    //     return $this->morphTo(null, 'transfer_type', 'transfer_order_no');
    // }
}
