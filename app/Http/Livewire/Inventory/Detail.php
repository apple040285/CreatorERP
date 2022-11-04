<?php

namespace App\Http\Livewire\Inventory;

use App\Enum\StatusEnum;
use App\Models\AdjustOrder;
use App\Models\StorehouseHasProduct;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Detail extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    // 商品庫存
    use \App\Concerns\WithStock;

    public function mount()
    {
        $this->sessionKey = request()->route()->getPrefix();

        // 獲得訂單編號
        $prefix = 'IC' . date("Ymd");
        $currentCount = AdjustOrder::where('adjust_order_no', 'like', "$prefix%")->count() + 1;
        $this->orderNo = $prefix . str($currentCount)->padLeft(3, '0');
    }

    // 繼續新增
    public function redirectBackForm()
    {
        redirect()->route('inventory-index');
    }

    // 編輯商品
    public function redirectEditForm()
    {
        redirect()->route('inventory-index', [
            'cart_id' => $this->getCurrentCart()->id
        ]);
    }

    // 刪除商品
    public function removeCartForm()
    {
        $this->removeCart($this->getCurrentCart()->id);
    }

    // 完成/列印
    public function completePrint()
    {
        // 創建訂單
        try {
            DB::beginTransaction();

            $order = AdjustOrder::create([
                'type'                      => 'transfer',
                'adjust_date'               => now(),
                'adjust_order_no'           => $this->orderNo,
                'staff_id'                  => auth()->id(),
                'total_amount'              => $this->getTotal(),
                'status'                    => StatusEnum::啟用->value,
                'status_approval'           => StatusEnum::啟用->value,
                // 不知道是捨
                'tax_type'                  => '', // 扣稅類別
                'account_setting_method'    => '', // 立帳方式
            ]);

            $staffStorehouse = auth()->user()->p_member->storehouse;

            $storehouseProducts = StorehouseHasProduct::query()
                ->with('storehouse', 'product')
                ->whereHas('product')
                ->where('storehouse_id', $staffStorehouse->id)
                ->get();

            foreach ($storehouseProducts as $storehouseProduct) {
                $order->items()->create([
                    'product_id'        => $storehouseProduct->product_id,
                    'storehouse_id'     => $staffStorehouse->id,
                    'current_quantity'  => $storehouseProduct?->stock ?? 0,
                    'quantity'          => $quantity = $this->getCartQuantity($storehouseProduct->product_id),
                    'price'             => $price = $storehouseProduct->product?->price ?? 0,
                    'amount'            => $quantity * $price,
                ]);

                $this->syncStorehouse($storehouseProduct->product_id, $staffStorehouse->id, $quantity);
            }

            $order->update([
                'total_amount' => 0,
            ]);

            DB::commit();

            // 清空商品
            $this->clearAllCart();

            // 寫入暫存
            // $this->sessionKey = $order->id;

            // foreach ($order->items as $baseOrder) {
            //     $this->addCart($baseOrder->product);
            //     $this->updateCart($baseOrder->product->id, $baseOrder->quantity);
            // }

            // $url = route('sales-check-view', ['customer' => $order->customer_manufacturer_id, 'order' => $order->id]);

            $this->flash('success', '調整訂單建立成功', [], route('index'));
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.inventory.detail')
            ->extends('layouts.main');
    }
}
