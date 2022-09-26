<?php

namespace App\Http\Livewire\SalesCheck;

use App\Models\CustomerManufacturer;
use Livewire\Component;

class Index extends Component
{
    public $customer;

    public function mount()
    {
        // dd(123);
    }

    public function getCustomerManufacturersProperty()
    {
        return CustomerManufacturer::get();
    }

    public function submit()
    {
        redirect()->route('sales-check-form', ['id' => $this->customer]);
    }

    public function render()
    {
        return view('livewire.sales-check.index')
            ->extends('layouts.main');
    }
}
