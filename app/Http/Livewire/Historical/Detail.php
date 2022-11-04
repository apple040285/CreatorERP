<?php

namespace App\Http\Livewire\Historical;

use App\Enum\SalesOrderType;
use App\Models\CustomerManufacturer;
use App\Models\SalesOrder;
use Livewire\Component;

class Detail extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    public $order_type;

    public $customer_id;

    public $product_id;

    public $starts_at;

    public $ends_at;

    protected $queryString = [
        'order_type',
        'customer_id',
        'product_id',
        'starts_at',
        'ends_at',
    ];

    public $order_id;

    public function getOrderProperty()
    {
        return SalesOrder::find($this->order_id);
    }

    public function getSalesOrdersProperty()
    {
        return SalesOrder::query()
            // ->whereHas('items.product', fn ($query) => $query->where('id', $this->product_id))
            // ->where('customer_manufacturer_id', $this->customer_id)
            ->when(isset($this->product_id), fn ($query) => $query->whereHas('items.product', fn ($query) => $query->where('id', $this->product_id)))
            ->when(isset($this->customer_id), fn ($query) => $query->where('customer_manufacturer_id', $this->customer_id))
            ->whereType(SalesOrderType::tryFrom($this->order_type))
            ->whereBetween('created_at', [$this->starts_at, $this->ends_at])
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.historical.detail')
            ->extends('layouts.main');
    }
}
