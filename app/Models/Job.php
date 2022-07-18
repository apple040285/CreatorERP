<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $appends = ['status_key'];

    protected $casts = [
        'status'     => StatusEnum::class,
        'disable_at' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    // TODO: 需要整合特徵
    protected function statusKey(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => StatusEnum::tryFrom($attributes['status'] ?? null)?->name,
        );
    }
}
