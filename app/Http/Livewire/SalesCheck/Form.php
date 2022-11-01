<?php

namespace App\Http\Livewire\SalesCheck;

use App\Concerns\WithCart;
use App\Models\CustomerManufacturer;
use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\StorehouseHasProduct;
use Livewire\Component;

class Form extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    public CustomerManufacturer|null $customer;

    public SalesOrder|null $order;

    public $product_id;

    /** @var int 數量 */
    public $quantity = 1;

    public $barcode;

    public function mount(CustomerManufacturer $customer, SalesOrder $order)
    {
        $this->customer = $customer;

        $this->order = $order;

        // 判斷是否訂單編輯
        if ($order->id) {
            $this->sessionKey = $order->id;
        }

        if ($this->isEditCart()) {
            $this->product_id   = $this->getCurrentCart()->id;
            $this->quantity     = $this->getCurrentCart()->quantity;
        }
    }

    public function getProductsProperty()
    {
        return Product::get();
    }

    public function getProductProperty()
    {
        return Product::where('id', $this->product_id)->first();
    }

    /** @var void 更新商品監聽 */
    public function updatedProductId($value)
    {
        if ($product = $this->getProductProperty()) {
            $this->barcode = $product->barcode;
        }
    }

    /** @var void 輸入條碼監聽 */
    public function updatingBarcode($value)
    {
        if ($product = Product::where('barcode', $value)->first()) {
            $this->product_id = $product->id;
            $this->dispatchBrowserEvent('reset', [
                ['target' => '#product', 'value' => $product->id],
            ]);
        }
    }

    /**
     * 直接寫入條碼
     *
     * @param  mixed $code
     * @return void
     */
    public function setBarcode($code)
    {
        if ($product = Product::where('barcode', str($code)->trim('!'))->first()) {
            $this->product_id = $product->id;
            $this->quantity = 1;
            $this->next();
        } else {
            $this->alert('error', '無此商品');
        }
    }

    /**
     * 下一筆
     *
     * @return void
     */
    public function next()
    {
        $data = $this->validate([
            'product_id'    => 'nullable',
            'barcode'       => 'nullable',
            'quantity'      => 'required',
        ]);

        if (!$product = $this->getProductProperty()) {
            $this->alert('error', '無此商品');
            return;
        }

        // $storehouseProduct = StorehouseHasProduct::query()
        //     ->where('product_id', $product->id)
        //     ->where('storehouse_id', auth()->user()->p_member->storehouse_id)
        //     ->first();
        // if (!$storehouseProduct) {
        //     $this->alert('error', '無此商品無庫存');
        //     return;
        // }

        // // 庫存不足
        // if ($storehouseProduct->stock < ($data['quantity'] + $this->getCartQuantity($product->id))) {
        //     $this->alert('error', '無此商品庫存不足');
        //     return;
        // }

        // $storehouseProduct->decrement('stock', $data['quantity']);

        $this->addCart($product);

        $this->alert('success', $product->name . '成功加入');

        // 重置
        $this->reset('quantity', 'product_id', 'barcode');

        // 發送至瀏覽器
        $this->dispatchBrowserEvent('reset', [
            ['target' => '#product', 'value' => null],
        ]);
    }

    /**
     * 確認
     *
     * @return void
     */
    public function finish()
    {
        if ($this->isCartEmpty()) {
            $this->alert('error', '清單內尚未存在物品');
            return;
        }

        redirect()->route('sales-check-detail', [
            'customer'  => $this->customer,
            'order'     => $this->order,
        ]);
    }

    /**
     * 更新
     *
     * @return void
     */
    public function update()
    {
        $data = $this->validate([
            'product_id'    => 'required',
            'quantity'      => 'required',
        ]);

        if (!$product = $this->getProductProperty()) {
            $this->alert('error', '無此商品');
        }

        $this->updateCart($data['product_id'], $data['quantity']);

        redirect()->route('sales-check-detail', [
            'customer'  => $this->customer,
            'order'     => $this->order,
        ]);
    }

    public function render()
    {
        return view('livewire.sales-check.form')
            ->extends('layouts.main');
    }
}
