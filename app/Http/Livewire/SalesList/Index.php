<?php

namespace App\Http\Livewire\SalesList;

use App\Enum\SalesOrderType;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    // 商品庫存
    use \App\Concerns\WithStock;

    public $order_id;

    protected $listeners = [
        'confirmed',
    ];

    public function mount()
    {
    }

    public function getOrdersProperty()
    {
        return SalesOrder::query()
            ->with('items')
            ->whereType(SalesOrderType::銷貨)
            ->where('staff_id', auth()->id())
            ->whereDate('sales_date', now())
            ->latest()
            ->get();
    }

    public function getOrderProperty()
    {
        return SalesOrder::find($this->order_id);
    }

    /**
     * 檢視訂單
     *
     * @return void
     */
    public function viewOrder()
    {
        if (!$order = $this->getOrderProperty()) {
            $this->alert('error', '讀取訂單發生錯誤');
            return;
        }

        $this->sessionKey = $order->id;

        foreach ($order->items as $baseOrder) {
            $this->addCart($baseOrder->product);
            $this->updateCart($baseOrder->product->id, $baseOrder->quantity);
        }

        redirect()->route('sales-check-view', ['customer' => $order->customer_manufacturer_id, 'order' => $order->id]);
    }

    /**
     * 編輯訂單
     *
     * @return void
     */
    public function editOrder()
    {
        if (!$order = $this->getOrderProperty()) {
            $this->alert('error', '讀取訂單發生錯誤');
            return;
        }

        $this->sessionKey = $order->id;

        foreach ($order->items as $baseOrder) {
            $this->addCart($baseOrder->product);
            $this->updateCart($baseOrder->product->id, $baseOrder->quantity);
        }

        redirect()->route('sales-check-detail', ['customer' => $order->customer_manufacturer_id, 'order' => $order->id]);
    }

    /**
     * 刪除訂單
     *
     * @return void
     */
    public function removeOrder()
    {
        $this->confirm('確定要進行此操作?', [
            'onConfirmed' => 'confirmed',
            'confirmButtonText' => '確定',
            'cancelButtonText' => '取消',
        ]);
    }

    public function confirmed()
    {
        if (!$order = $this->getOrderProperty()) {
            $this->alert('error', '刪除發生錯誤');
            return;
        }

        try {
            DB::beginTransaction();

            if (isset($order->items) && count($order->items) > 0) {
                foreach ($order->items as $key => $item) {
                    $this->inventoryChange('increment', $item['product_id'], $item['storehouse_id'], $item['quantity']);
                }
            }

            $order->delete();

            DB::commit();

            $this->alert('success', '刪除成功', [], route('return-list-index'));
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sales-list.index')
            ->extends('layouts.main');
    }
}
