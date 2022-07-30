<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerManufacturer extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    use \Stancl\VirtualColumn\VirtualColumn;

    protected $guarded = [];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'customer_manufacturer_category_id',
            'currency_id',
            'code',
            'type',
            'full_name',
            'short_name',
            'alias',
            'email',
            'fax',
            'unicode',
            'payment_type',
            'invoice_type',
            'invoice_name',
            'invoice_address',
            'company_address',
            'zip_code',
            'status',
            'disable_at',
            'status',
            'remark',
        ];
    }

    public function category()
    {
        return $this->belongsTo(CustomerManufacturerCategory::class, 'customer_manufacturer_category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
