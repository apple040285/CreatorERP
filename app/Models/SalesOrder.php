<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $appends = [
        'date',
        'order_no',
        'document_type',
        'print_url',
    ];

    protected $casts = [
        'purchase_date'     => 'datetime:Y-m-d',
        'created_at'        => 'datetime:Y-m-d',
        'updated_at'        => 'datetime:Y-m-d',
    ];

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['sales_date'] ?? null,
        );
    }

    protected function orderNo(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['sales_order_no'] ?? null,
        );
    }

    protected function documentType(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => '銷貨憑單',
        );
    }

    protected function printUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => \Illuminate\Support\Facades\URL::temporarySignedRoute(
                'sales.print',
                now()->addMinutes(30),
                ['id' => $attributes['id']]
            ),
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
        return $this->hasMany(SalesOrderItem::class);
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
