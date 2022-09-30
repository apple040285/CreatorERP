<?php

namespace App\Http\Livewire\SalesCheck\Concerns;

use App\Models\CustomerManufacturer;
use App\Models\Product;
use App\Models\SalesOrder;

trait WithCustomerAndProductAndOrder
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public function getCustomerProperty()
    {
        return CustomerManufacturer::find($this->customer_id);
    }

    public function getProductProperty()
    {
        return Product::find($this->product_id);
    }

    public function getOrderProperty()
    {
        return SalesOrder::find($this->order_id);
    }

    public function redirectSaleForm($id = null, $parameters = [])
    {
        if (isset($this->order_id)) {
            redirect()->route('sales-check-form', ['customer_id' => $this->oreder->customer_manufacturer_id, 'order_id' => $this->order->id]);
        }

        if (isset($this->customer_id)) {
            redirect()->route('sales-check-form', ['customer_id' => $id ?? $this->customer_id, ...$parameters]);
        }
    }

    public function redirectSaleDetail($id = null, $parameters = [])
    {
        if (isset($this->order_id)) {
            redirect()->route('sales-check-detail', ['customer_id' => $this->order->customer_manufacturer_id, 'order_id' => $this->order->id]);
        }

        if (isset($this->customer_id)) {
            redirect()->route('sales-check-detail', ['customer_id' => $id ?? $this->customer_id, ...$parameters]);
        }
    }
}
