<?php

namespace App\Exports;

use App\Enum\AdjustOrderType;
use App\Models\AdjustOrderItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class AdjustOrdersExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting, WithCustomValueBinder
{
    public $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AdjustOrderItem::query()
            ->whereHas(
                'order',
                fn ($query) => $query
                    ->where('type', AdjustOrderType::調整->value)
                    ->tap(function ($query) {
                        if (isset($this->attributes['columnFilters']) && isset($this->attributes['columnFilters']['adjust_date'])) {
                            $value = $this->attributes['columnFilters']['adjust_date'];
                            if (str($value)->contains(' to ') && $split = str($value)->split('/ to /')) {
                                $query
                                    ->whereDate('adjust_date', '>=', $split[0])
                                    ->whereDate('adjust_date', '<=', $split[1]);
                            } else {
                                $query->whereDate('adjust_date', $value);
                            }
                        }
                    })
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            //
            '盤點日期',
            '盤點單號',
            '商品ID',
            '商品名稱',
            '盤點數量',
            '國際條碼',
            '倉庫ID',
            '倉庫名稱',
            '盤點人員ID',
        ];
    }

    public function map($data): array
    {
        return [
            $data->order->adjust_date,
            $data->order->adjust_order_no,
            $data->product->code,
            $data->product->name,
            $data->quantity,
            strval($data->product->barcode),
            $data->storehouse?->code,
            $data->storehouse?->name,
            $data->order->staff?->code,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'G' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $column = $cell->getColumn();
        // 長度超過 15 會自動轉為科學符號
        if (in_array($column, ['F'])) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }
}
