<?php

namespace App\Http\Livewire\SalesCheck;

use App\Models\CustomerManufacturer;
use Livewire\Component;

class Index extends \LivewireUI\Modal\ModalComponent
{
    use Concerns\WithCustomerAndProductAndOrder;

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
        redirect()->route('sales-check-form', ['customer' => $this->customer_id]);
    }

    public function render()
    {
        return view('livewire.sales-check.index')
            ->extends('layouts.main');
    }
}
