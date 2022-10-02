<?php

namespace App\Http\Livewire\SalesCheck;

use App\Enum\SalesOrderType;
use App\Models\CustomerManufacturer;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Detail extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    use \App\Concerns\ModelRelationWith;

    public CustomerManufacturer|null $customer;

    public SalesOrder|null $order;

    public string $orderNo;

    public function mount(CustomerManufacturer $customer, SalesOrder $order)
    {
        $this->customer = $customer;

        $this->order = $order->load('customer_manufacturer', 'items.product');

        // 獲得訂單編號
        $prefix = 'SA' . date("Ymd");
        $currentCount = SalesOrder::whereType(SalesOrderType::銷貨->value)->where('sales_order_no', 'like', "$prefix%")->count() + 1;
        $this->orderNo = $prefix . str($currentCount)->padLeft(3, '0');

        // 判斷是否訂單編輯
        if ($order->id) {
            $this->sessionKey = $order->id;
            $this->orderNo = $order->sales_order_no;
        }
    }

    // 繼續新增
    public function redirectBackForm()
    {
        redirect()->route('sales-check-form', [
            'customer'  => $this->customer,
            'order'     => $this->order,
        ]);
    }

    // 編輯商品
    public function redirectEditForm()
    {
        redirect()->route('sales-check-form', [
            'customer'  => $this->customer,
            'order'     => $this->order,
            'cart_id'   => $this->getCart()->id
        ]);
    }

    // 刪除商品
    public function removeCartForm()
    {
        $this->removeCart($this->getCart()->id);
    }

    // 完成/列印
    public function completePrint()
    {
        // 編輯訂單
        if ($this->order->id) {
            try {
                DB::beginTransaction();

                $order = SalesOrder::find($this->order->id);

                $mapCarts = $this->getCarts()->map(fn ($cart) => [
                    'product_id'    => $cart->id,
                    'storehouse_id' => 0,
                    'quantity'      => $cart->quantity,
                    'price'         => $cart->price,
                    'amount'        => $cart->getPriceSum(),
                ]);

                $this->proccesRelationWithRequest($order->items(), $mapCarts->toArray());

                $order->update([
                    'total_amount' => $this->getTotal(),
                ]);

                DB::commit();

                $this->clearAllCart();

                $this->flash('success', '訂單修改成功', [], route('index'));

                return;
            } catch (\Exception $e) {
                report($e);
                DB::rollBack();
                $this->alert('error', $e->getMessage());
            }
        }

        // 創建訂單
        try {
            DB::beginTransaction();

            $order = SalesOrder::create([
                'type'                      => SalesOrderType::銷貨->value,
                'sales_date'                => now(),
                'sales_order_no'            => $this->orderNo,
                'customer_manufacturer_id'  => $this->customer->id,
                'staff_id'                  => auth()->id(),
                'total_amount'              => $this->getTotal(),
                'status'                    => '',
                'status_approval'           => '',
                // 不知道是捨
                'tax_type'                  => '', // 扣稅類別
                'account_setting_method'    => '', // 立帳方式
            ]);

            foreach ($this->getCarts() as $cart) {
                $order->items()->create([
                    'product_id'    => $cart->id,
                    'storehouse_id' => 0,
                    'quantity'      => $cart->quantity,
                    'price'         => $cart->price,
                    'amount'        => $cart->getPriceSum(),
                ]);
            }

            $order->update([
                'total_amount' => $this->getTotal(),
            ]);

            DB::commit();

            $this->clearAllCart();

            $this->flash('success', '訂單建立成功', [], route('index'));
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sales-check.detail')
            ->extends('layouts.main');
    }
}
