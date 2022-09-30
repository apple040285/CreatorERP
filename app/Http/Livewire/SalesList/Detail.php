<?php

namespace App\Http\Livewire\SalesList;

use Livewire\Component;

class Detail extends Component
{
    use Concerns\WithCustomerAndProductAndOrder;

    public $item_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        return view('livewire.sales-list.detail')
            ->extends('layouts.main');
    }
}
