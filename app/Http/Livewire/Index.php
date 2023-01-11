<?php

namespace App\Http\Livewire;

use App\Models\CustomerManufacturer;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    public function downloadBy($type)
    {
        // 日誌參數
        $logs = logs()->build(['driver' => 'daily', 'path' => storage_path("logs/$type/laravel.log")]);
        // 寫入檔案名稱
        $filename = $type . '/' . date('YmdHisu') . '.txt';
        //
        switch ($type) {
            case 'product':
                $content = '';
                foreach (Product::all() as $product) {
                    $content .= collect([
                        $product->barcode,
                        $product->invoice_name,
                        $product->unit,
                        $product->price,
                    ])->join(',') . PHP_EOL;
                }
                $logs->info('=========================================');
                $logs->info('授權用戶: ' . json_encode(auth()->user()));
                $logs->info('檔案名稱: ' . $filename);
                $logs->info('檔案內容: ' . $content);
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                $logs->info('檔案網址: ' . $file_url);
                $logs->info('=========================================');
                return response()->download($file_url, 'product.txt');
            case 'customer':
                $content = '';
                foreach (CustomerManufacturer::all() as $customer) {
                    $content .= collect([
                        $customer->code,
                        $customer->full_name,
                        $customer->phone_one,
                        $customer->company_address,
                    ])->join(',') . PHP_EOL;
                }
                $logs->info('=========================================');
                $logs->info('授權用戶: ' . json_encode(auth()->user()));
                $logs->info('檔案名稱: ' . $filename);
                $logs->info('檔案內容: ' . $content);
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                $logs->info('檔案網址: ' . $file_url);
                $logs->info('=========================================');
                return response()->download($file_url, 'customer.txt');
            case 'sales':
                $content = '';
                foreach (Staff::all() as $staff) {
                    if (auth()->id() === $staff->id) {
                        $content .= collect([
                            $staff->code,
                            $staff->name,
                            $staff->telephone,
                        ])->join(',') . PHP_EOL;
                    }
                }
                $logs->info('=========================================');
                $logs->info('授權用戶: ' . json_encode(auth()->user()));
                $logs->info('檔案名稱: ' . $filename);
                $logs->info('檔案內容: ' . $content);
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                $logs->info('檔案網址: ' . $file_url);
                $logs->info('=========================================');
                return response()->download($file_url, 'sales.txt');
            default:
                break;
        }
    }

    public function render()
    {
        return view('livewire.index')
            ->extends('layouts.main');
    }
}
