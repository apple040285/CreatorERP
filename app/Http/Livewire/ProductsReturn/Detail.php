<?php

namespace App\Http\Livewire\ProductsReturn;

use App\Enum\SalesOrderType;
use App\Enum\StatusEnum;
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

    // 商品庫存
    use \App\Concerns\WithStock;

    use \App\Concerns\ModelRelationWith;

    public CustomerManufacturer|null $customer;

    public SalesOrder|null $order;

    public string $orderNo;

    public function mount(CustomerManufacturer $customer, SalesOrder $order)
    {
        $this->customer = $customer;

        $this->order = $order->load('customer_manufacturer', 'items.product');

        // 獲得訂單編號
        $prefix = 'SB' . date("Ymd");
        $currentCount = SalesOrder::whereType(SalesOrderType::退貨->value)->where('sales_order_no', 'like', "$prefix%")->count() + 1;
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
        redirect()->route('products-return-form', [
            'customer'  => $this->customer,
            'order'     => $this->order,
        ]);
    }

    // 編輯商品
    public function redirectEditForm()
    {
        redirect()->route('products-return-form', [
            'customer'  => $this->customer,
            'order'     => $this->order,
            'cart_id'   => $this->getCurrentCart()->id
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
        // 編輯訂單
        if ($this->order->id) {
            try {
                DB::beginTransaction();

                $order = SalesOrder::find($this->order->id);

                $mapCarts = $this->getCarts()->map(fn ($cart) => [
                    'product_id'    => $cart->id,
                    'storehouse_id' => auth()->user()->p_member->storehouse_id,
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
            } catch (\Exception $e) {
                report($e);
                DB::rollBack();
                $this->alert('error', $e->getMessage());
            }

            return;
        }

        // 創建訂單
        try {
            DB::beginTransaction();

            $order = SalesOrder::create([
                'type'                      => SalesOrderType::退貨->value,
                'sales_date'                => now(),
                'sales_order_no'            => $this->orderNo,
                'customer_manufacturer_id'  => $this->customer->id,
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

                $order->items()->create([
                    'product_id'    => $cart->id,
                    'storehouse_id' => $staffStorehouse->id,
                    'quantity'      => $cart->quantity,
                    'price'         => $cart->price,
                    'amount'        => $cart->getPriceSum(),
                ]);

                // 檢查庫存
                // if (!$this->checkStockAndDeduct($cart->id, $staffStorehouse->id, $cart->quantity)) {
                //     $this->alert('error', '商品: `' . $cart['name'] . '`' . PHP_EOL . '倉庫: `' . $staffStorehouse['name'] . '` 的庫存不足');
                //     return;
                // }
            }

            $order->update([
                'total_amount' => $this->getTotal(),
            ]);

            DB::commit();

            $this->clearAllCart();

            // 寫入暫存
            $this->sessionKey = $order->id;

            foreach ($order->items as $baseOrder) {
                $this->addCart($baseOrder->product);
                $this->updateCart($baseOrder->product->id, $baseOrder->quantity);
            }

            $url = route('products-return-view', ['customer' => $order->customer_manufacturer_id, 'order' => $order->id]);

            $this->flash('success', '訂單建立成功', [], $url);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.products-return.detail')
            ->extends('layouts.main');
    }
}
