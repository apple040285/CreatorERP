<?php

namespace App\Http\Livewire\SalesList\Concerns;

use App\Models\CustomerManufacturer;
use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderItem;

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

    public function getOrderItemProperty()
    {
        return SalesOrderItem::find($this->item_id);
    }

    public function redirectSaleForm()
    {
        redirect()->route('sales-list-form', ['item_id' => $this->item_id]);
    }

    public function redirectSaleDetail()
    {
        redirect()->route('sales-list-detail', ['order_id' => $this->order?->id ?? $this->orderItem->sales_order_id]);
    }

    /** */
    public function getProductsProperty()
    {
        return Product::get();
    }
}
