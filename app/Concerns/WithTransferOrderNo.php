<?php

namespace App\Concerns;

trait WithTransferOrderNo
{
    /**
     * 檢查庫存並且扣除
     *
     * @param  mixed $product_id
     * @param  mixed $storehouse_id
     * @param  mixed $quantity
     * @return bool
     */
    public function updateTransferOrderNo($record, $attributes)
    {
        //
        switch ($attributes['transfer_type']) {
            case 'App\Models\ProcurementOrder':
                $order = \App\Models\ProcurementOrder::where('procurement_order_no', $attributes['transfer_order_no'])->first();
                break;
            case 'App\Models\PurchaseOrder':
                $order = \App\Models\PurchaseOrder::where('purchase_order_no', $attributes['transfer_order_no'])->first();
                break;
            case 'App\Models\QuotationOrder':
                $order = \App\Models\QuotationOrder::where('quotation_order_no', $attributes['transfer_order_no'])->first();
                break;
            case 'App\Models\SubscriberOrder':
                $order = \App\Models\SubscriberOrder::where('subscriber_order_no', $attributes['transfer_order_no'])->first();
                break;
            case 'App\Models\SalesOrder':
                $order = \App\Models\SalesOrder::where('sales_order_no', $attributes['transfer_order_no'])->first();
                break;
            default:
                throw new \Exception('轉入單號類型不存在.');
        }
        if (!$order) throw new \Exception('轉入單號不存在.');

        // 更新轉入單號
        $record->update([
            'transfer_type'     => get_class($order),
            'transfer_order_no' => $order['id'],
        ]);
    }
}
