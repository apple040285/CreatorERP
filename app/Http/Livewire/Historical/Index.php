<?php

namespace App\Http\Livewire\Historical;

use App\Models\CustomerManufacturer;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $order_type;

    public $customer_id = null;

    public $product_id = null;

    public $starts_at;

    public $ends_at;

    /** @var CustomerManufacturer 讀取客戶下拉列表 */
    public function getCustomerManufacturersProperty()
    {
        return CustomerManufacturer::get();
    }

    /** @var Product 讀取商品下拉列表 */
    public function getProductsProperty()
    {
        return Product::get();
    }

    public function finish()
    {
        $this->validate(
            [
                'order_type'    => 'required',
                // 'customer_id'   => 'required',
                // 'product_id'    => 'required',
                'starts_at'     => 'required',
                'ends_at'       => 'required',
            ],
            [],
            [
                'order_type'    => '類別',
                'customer_id'   => '客戶',
                'product_id'    => '品名',
                'starts_at'     => '起始日',
                'ends_at'       => '截止日',
            ]
        );

        redirect()->route('historical-transactions-detail', [
            'order_type'    => $this->order_type,
            'customer_id'   => $this->customer_id,
            'product_id'    => $this->product_id,
            'starts_at'     => $this->starts_at,
            'ends_at'       => $this->ends_at,
        ]);
    }


    public function render()
    {
        return view('livewire.historical.index')
            ->extends('layouts.main');
    }
}
