<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $casts = [
        'images'        => 'array',
        'created_at'    => 'datetime:Y-m-d',
        'updated_at'    => 'datetime:Y-m-d',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function storehouses()
    {
        return $this->belongsToMany(Storehouse::class, 'storehouse_has_products')
            ->using(StorehouseHasProduct::class)
            ->withPivot(/*'id as id2', 'stock as stock', 'safety_stock as safety_stock', */'id', 'stock', 'safety_stock');
    }
}
