<?php

namespace App\Http\Livewire\SalesList;

use Livewire\Component;

class Form extends Component
{
    use Concerns\WithCustomerAndProductAndOrder;

    public $quantity;

    public function mount($item_id)
    {
        $this->item_id = $item_id;

        $this->prod_id = $this->orderItem->product_id;

        $this->quantity = $this->orderItem->quantity;
    }

    public function update()
    {
        $this->redirectSaleDetail();
    }

    public function render()
    {
        return view('livewire.sales-list.form')
            ->extends('layouts.main');
    }
}
