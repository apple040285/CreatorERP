<?php

namespace App\Http\Livewire\TransferJob;

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
    }

    public function render()
    {
        return view('livewire.transfer-job.detail')
            ->extends('layouts.main');
    }
}
