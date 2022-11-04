<?php

namespace App\Http\Livewire\TransferJob;

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
        $prefix = 'IJ' . date("Ymd");
        $currentCount = AdjustOrder::where('adjust_order_no', 'like', "$prefix%")->count() + 1;
        $this->orderNo = $prefix . str($currentCount)->padLeft(3, '0');
    }

    // 繼續新增
    public function redirectBackForm()
    {
        redirect()->route('transfer-job-index');
    }

    // 編輯商品
    public function redirectEditForm()
    {
        redirect()->route('transfer-job-index', [
            'cart_id' => $this->getCurrentCart()->id
        ]);
    }

    // 刪除商品
    public function removeCartForm()
    {
        // $this->removeCart($this->getCurrentCart()->id);
        $this->removeCart($this->getCurrentCart()->id);
    }

    // 完成/列印
    public function completePrint()
    {
        // 創建訂單
        try {
            DB::beginTransaction();

            $order = AdjustOrder::create([
                'type'                      => 'adjust',
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

            foreach ($this->getCarts() as $cart) {
                $staffStorehouse = auth()->user()->p_member->storehouse;

                $storehouseProduct = StorehouseHasProduct::query()
                    ->where('product_id', $cart->id)
                    ->where('storehouse_id', $staffStorehouse->id)
                    ->first();

                $order->items()->create([
                    'product_id'        => $cart->id,
                    'storehouse_id'     => $staffStorehouse->id,
                    'current_quantity'  => $storehouseProduct?->stock ?? 0,
                    'quantity'          => $cart->quantity,
                    'price'             => $cart->price,
                    'amount'            => $cart->getPriceSum(),
                ]);

                $this->transferStorehouse($cart->id, $staffStorehouse->id, $cart->quantity);
            }

            $order->update([
                'total_amount' => $this->getTotal(),
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
        return view('livewire.transfer-job.detail')
            ->extends('layouts.main');
    }
}
