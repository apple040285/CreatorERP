<?php

namespace App\Http\Livewire\Inventory;

use App\Models\AdjustOrder;
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
    }

    public function render()
    {
        return view('livewire.inventory.detail')
            ->extends('layouts.main');
    }
}
