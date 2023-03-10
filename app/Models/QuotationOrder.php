<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationOrder extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $appends = ['order_no'];

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];

    protected function orderNo(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['quotation_order_no'],
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
        return $this->hasMany(QuotationOrderItem::class);
    }

    public function sales_orders()
    {
        return $this->morphMany(SalesOrder::class, null, 'transfer_type', 'transfer_order_no');
    }

    /**
     * 轉入單號
     *
     * @return void
     */
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
