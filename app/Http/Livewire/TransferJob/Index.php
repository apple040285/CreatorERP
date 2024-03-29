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
    public $quantity;

    public $barcode;

    public function mount()
    {
        $this->sessionKey = request()->route()->getPrefix();

        if ($this->isEditCart()) {
            $this->product_id   = $this->getCurrentCart()->id;
            $this->quantity     = $this->getCurrentCart()->quantity;
        }
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

            // 發送至瀏覽器
            $this->dispatchBrowserEvent('reset', ['target' => '#product', 'value' => $product->id]);
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
        if (env('AUTO_PAD_CHARACTER')) $code = str($code)->trim('!')->padLeft(13, '0');

        if ($product = Product::where('barcode', str($code)->trim('!'))->first()) {
            $this->product_id = $product->id;
            // if (!isset($this->quantity)) $this->quantity = 1;
            if (env('AUTO_NEXT_SAVE')) $this->next();
        } else {
            $this->alert('error', '無此商品');
        }

        $this->dispatchBrowserEvent('focus', '#quantity');
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

        $this->addCart($product, $data['quantity']);

        $this->alert('success', $product->name . '成功加入');

        // 重置
        $this->reset('quantity', 'product_id', 'barcode');

        // 發送至瀏覽器
        $this->dispatchBrowserEvent('reset', ['target' => '#product', 'value' => null]);
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
            $this->alert('error', '無此商品');
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
