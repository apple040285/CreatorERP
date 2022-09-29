<?php

namespace App\Http\Livewire\SalesList;

use App\Models\SalesOrder;
use Livewire\Component;

class Index extends Component
{
    public $order_id;

    public function mount()
    {
    }

    public function getOrdersProperty()
    {
        return SalesOrder::with('items')->latest()->get();
    }

    public function getOrderProperty()
    {
        return SalesOrder::find($this->order_id)->with('items');
    }

    public function render()
    {
        return view('livewire.sales-list.index')
            ->extends('layouts.main');
    }
}
