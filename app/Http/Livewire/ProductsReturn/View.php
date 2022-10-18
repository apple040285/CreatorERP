<?php

namespace App\Http\Livewire\ProductsReturn;

use App\Models\CustomerManufacturer;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class View extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    use \App\Concerns\ModelRelationWith;

    public CustomerManufacturer|null $customer;

    public SalesOrder|null $order;

    public string $orderNo;

    public function mount(CustomerManufacturer $customer, SalesOrder $order)
    {
        $this->customer = $customer;

        $this->order = $order->load('customer_manufacturer', 'items.product');

        $this->sessionKey = $order->id;

        $this->orderNo = $order->sales_order_no;
    }

    // 繼續新增
    public function redirectBackForm()
    {
        $this->clearAllCart();

        redirect()->route('index');
    }

    public function downloadSale($order)
    {
        $filename = 'return.txt';
        $content = '';
        foreach ($order->items as $item) {
            $content .= collect([
                $order->sales_order_no,
                $order->sales_date->format('Y/m/d'),
                $order->customer_manufacturer->code,
                $item->product->barcode,
                $item->quantity,
                $item->price,
            ])->join(',') . PHP_EOL;
        }
        Storage::put($filename, $content);
        $file_url = storage_path('app/' . $filename);
        return response()->download($file_url, $filename);
    }

    // 完成/列印
    public function completePrint()
    {
        $order = SalesOrder::find($this->order->id);

        $this->alert('success', '印列中...');

        return $this->downloadSale($order);
    }

    public function render()
    {
        return view('livewire.products-return.view')
            ->extends('layouts.main');
    }
}
