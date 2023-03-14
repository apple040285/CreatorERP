<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $appends = ['date', 'order_no', 'document_type'];

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['procurement_date'] ?? null,
        );
    }

    protected function orderNo(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['procurement_order_no'] ?? null,
        );
    }

    protected function documentType(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '採購憑單',
        );
    }

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

    public function transfer()
    {
        return $this->morphTo(null, 'transfer_type', 'transfer_order_no');
    }

    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        foreach ($this->appends as $key => $append) {
            unset($array[$append]);
        }

        return $array;
    }
}
