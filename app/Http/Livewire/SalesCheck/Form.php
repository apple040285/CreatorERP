<?php

namespace App\Http\Livewire\SalesCheck;

use App\Concerns\WithCart;
use App\Models\CustomerManufacturer;
use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
    // 購物車特徵
    use \App\Concerns\WithCart;

    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    use Concerns\WithCustomerAndProductAndOrder;

    /** @var mixed 客戶ID */
    public $customer_id;

    /** @var mixed 產品 id */
    public $product_id;

    /** @var array 產品紀錄 id */
    public array $productList = [];

    /** @var int 數量 */
    public $quantity = 1;

    public $prod_id;

    protected $queryString = [
        'prod_id'
    ];

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;

        $this->productList = session()->get('product_list', []);

        if (isset($this->prod_id) && $this->prod_id) {
            $this->product_id = $this->prod_id;
            $this->quantity = $this->productList[$this->prod_id] ?? 1;
        }
    }

    public function getCustomerProperty()
    {
        return CustomerManufacturer::find($this->customer_id);
    }

    public function getProductsProperty()
    {
        return Product::get();
    }

    public function setBarcode($code)
    {
        $product = Product::where('barcode', str($code)->trim('!'))->first();
        if ($product) {
            $this->product_id = $product->id;
            $this->quantity = 1;
            $this->next();
            $this->alert('success', $product->name . '成功加入');
        } else {
            $this->alert('error', '此無商品');
        }
    }

    public function next()
    {
        $data = $this->validate([
            'product_id'    => 'required',
            'quantity'      => 'required',
        ]);

        if (isset($this->productList[$data['product_id']]))
            $this->productList[$data['product_id']]++;
        else
            $this->productList[$data['product_id']] = $data['quantity'];

        // 重置
        $this->reset('quantity');

        $this->dispatchBrowserEvent('select2.change', [
            'target'    => '#product',
            'value'     => null
        ]);
    }

    public function update()
    {
        $data = $this->validate([
            'product_id'    => 'required',
            'quantity'      => 'required',
        ]);

        $this->productList[$this->prod_id] = $data['quantity'];

        session()->put('product_list', $this->productList);

        $this->redirectSaleDetail();
    }

    public function finish()
    {
        if (count($this->productList) === 0) {
            $this->addError('message', '清單內尚未存在物品');
            return;
        }

        session()->put('product_list', $this->productList);

        $this->redirectSaleDetail();
    }

    public function render()
    {
        return view('livewire.sales-check.form')
            ->extends('layouts.main');
    }
}
