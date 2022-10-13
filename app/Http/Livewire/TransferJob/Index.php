<?php

namespace App\Http\Livewire\TransferJob;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    // 購物車特徵
    use \App\Concerns\WithCart;

    public $product_id;

    /** @var int 數量 */
    public $quantity = 1;

    public $barcode;

    public function mount()
    {
        $this->sessionKey = request()->route()->getPrefix();

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
            $this->alert('error', '此無商品');
            return;
        }

        $this->addCart($product, $data['quantity']);

        $this->alert('success', $product->name . '成功加入');

        // 重置
        $this->reset('quantity', 'product_id', 'barcode');

        // 發送至瀏覽器
        // $this->dispatchBrowserEvent('reset', [
        //     ['target' => '#product', 'value' => null],
        // ]);
    }

    /**
     * 確認
     *
     * @return void
     */
    public function finish()
    {
        redirect()->route('transfer-job-detail');
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
            $this->alert('error', '此無商品');
        }

        $this->updateCart($data['product_id'], $data['quantity']);

        redirect()->route('transfer-job-detail');
    }


    public function render()
    {
        return view('livewire.transfer-job.index')
            ->extends('layouts.main');
    }
}
