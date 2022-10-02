<?php

namespace App\Http\Livewire\ProductsReturn;

use App\Models\CustomerManufacturer;
use Livewire\Component;

class Index extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $customer_id;

    /** @var CustomerManufacturer 讀取客戶下拉列表 */
    public function getCustomerManufacturersProperty()
    {
        return CustomerManufacturer::get();
    }

    /**
     * 送出確認
     *
     * @return void
     */
    public function submit()
    {
        if (!$this->customer_id) {
            $this->alert('error', '請選擇下拉選單');
            return;
        }

        redirect()->route('products-return-form', ['customer' => $this->customer_id]);
    }

    public function render()
    {
        return view('livewire.products-return.index')
            ->extends('layouts.main');
    }
}
