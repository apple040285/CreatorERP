<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // 搜尋器
    use \Laravel\Scout\Searchable;

    // 創建人 and 更新人
    use \Wildside\Userstamps\Userstamps;

    use \Stancl\VirtualColumn\VirtualColumn;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'department_id',
            'job_id',
            'code',
            'name',
            'email',
            'alias',
            'telephone',
            'cellphone',
            'residence_address',
            'mailing_address',
            'arrival_date',
            'resignation_date',
            'remark',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
