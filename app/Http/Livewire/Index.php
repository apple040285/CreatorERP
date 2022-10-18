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
        switch ($type) {
            case 'product':
                $filename = $type . '.txt';
                $content = '';
                foreach (Product::all() as $product) {
                    $content .= collect([
                        $product->barcode,
                        $product->name,
                        $product->unit,
                        $product->price,
                    ])->join(',') . PHP_EOL;
                }
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                return response()->download($file_url, $filename);
            case 'customer':
                $filename = $type . '.txt';
                $content = '';
                foreach (CustomerManufacturer::all() as $customer) {
                    $content .= collect([
                        $customer->code,
                        $customer->full_name,
                        $customer->phone_one,
                        $customer->company_address,
                    ])->join(',') . PHP_EOL;
                }
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                return response()->download($file_url, $filename);
            case 'sales':
                $filename = $type . '.txt';
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
                Storage::put($filename, $content);
                $file_url = storage_path('app/' . $filename);
                return response()->download($file_url, $filename);
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
