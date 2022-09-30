<?php

namespace App\Http\Livewire\SalesCheck;

use App\Models\Product;
use App\Models\SalesOrder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Detail extends Component
{
    // https://github.com/jantinnerezo/livewire-alert
    use \Jantinnerezo\LivewireAlert\LivewireAlert;

    use Concerns\WithCustomerAndProductAndOrder;

    /** @var mixed 客戶ID */
    public $customer_id;

    public $product_id;

    public $sales_order_no;

    /** @var \Illuminate\Support\Collection 產品紀錄 ids */
    public $product_ids = [];

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;

        if (!session()->has('product_list')) {
            $this->redirectRoute('sales-check-form', ['customer_id' => $this->customer_id]);
            return;
        }

        $this->sales_order_no = date("YmdHis");

        $this->product_ids = collect(session()->get('product_list'));
    }

    public function getProductsProperty()
    {
        return Product::whereIn('id', $this->product_ids->keys())->get();
    }

    // 完成列印
    public function completePrint()
    {
        try {
            DB::beginTransaction();

            $order = SalesOrder::create([
                'sales_date'                => now(),
                'sales_order_no'            => $this->sales_order_no,
                'customer_manufacturer_id'  => $this->getCustomerProperty()?->id,
                'staff_id'                  => null,
                'total_amount'              => 0,
                'status'                    => '',
                'status_approval'           => '',
                // 不知道是捨
                'tax_type'                  => '', // 扣稅類別
                'account_setting_method'    => '', // 立帳方式
            ]);

            $total_amount = 0;
            foreach ($this->getProductsProperty() as $product) {
                $quantity = $this->product_ids[$product->id] ?? 0;

                $total_amount += $product->price * $quantity;

                $order->items()->create([
                    'product_id'    => $product->id,
                    'storehouse_id' => 0,
                    'quantity'      => $quantity,
                    'price'         => $product->price,
                    'amount'        => $total_amount,
                ]);
            }

            $order->update([
                'total_amount' => $total_amount,
            ]);

            DB::commit();
            $this->alert('success', 'OK');
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
