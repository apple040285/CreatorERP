<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Job;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\BeforeImport;

class StaffsImport implements ToModel, WithUpserts, WithStartRow, SkipsEmptyRows, WithValidation, WithEvents
{
    use RegistersEventListeners;

    protected Model $department;

    protected Model $job;

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $this->department = Department::firstOrCreate(
                    [
                        'code' => 'default'
                    ],
                    [
                        'name' => '預設部門',
                        'remark' => '系統預設部門',
                    ]
                );

                $this->job = Job::firstOrCreate(
                    [
                        'code' => 'default'
                    ],
                    [
                        'name' => '預設職稱',
                        'remark' => '系統預設職稱',
                    ]
                );
            },
        ];
    }

    public function model(array $row)
    {
        return new Staff([
            'department_id'     => $this->department->id,
            'job_id'            => $this->job->id,
            'code'              => $row[0],
            'name'              => $row[1],
        ]);
    }

    /**
     * 更新模型唯一 key (可多欄位)
     *
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'code';
    }

    /**
     * 從第二排開始
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * 驗證欄位
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            0 => ['required'],

            1 => ['required'],
        ];
    }

    /**
     * 欄位中文化
     *
     * @return array
     */
    public function customValidationAttributes(): array
    {
        return [
            0 => '人員編號',
            1 => '人員名稱',
        ];
    }
}
