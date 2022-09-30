<?php

namespace App\Http\Livewire\SalesCheck;

use App\Models\CustomerManufacturer;
use Livewire\Component;

class Index extends Component
{
    use Concerns\WithCustomerAndProductAndOrder;

    public $customer_id;

    public function getCustomerManufacturersProperty()
    {
        return CustomerManufacturer::get();
    }

    public function submit()
    {
        $this->redirectSaleForm();
    }

    public function render()
    {
        return view('livewire.sales-check.index')
            ->extends('layouts.main');
    }
}
