<?php

namespace App\Concerns;

use App\Models\ProcurementOrder;
use App\Models\PurchaseOrder;
use App\Models\QuotationOrder;
use App\Models\SalesOrder;
use App\Models\SubscriberOrder;
use Illuminate\Database\Eloquent\Model;

trait WithTransferOrderNo
{
    protected $orders = [
        ProcurementOrder::class,
        PurchaseOrder::class,
        QuotationOrder::class,
        SubscriberOrder::class,
        SalesOrder::class,
    ];

    public function getProjectOrders($project_id)
    {
        $procurementOrders = ProcurementOrder::query()
            ->where('project_id', $project_id)
            ->get();

        $purchaseOrders = PurchaseOrder::query()
            ->where('project_id', $project_id)
            ->get();

        $quotationOrders = QuotationOrder::query()
            ->where('project_id', $project_id)
            ->get();

        $subscriberOrders = SubscriberOrder::query()
            ->where('project_id', $project_id)
            ->get();

        $salesOrders = SalesOrder::query()
            ->where('project_id', $project_id)
            ->get();

        $data = array_merge(
            $procurementOrders->toArray(),
            $purchaseOrders->toArray(),
            $quotationOrders->toArray(),
            $subscriberOrders->toArray(),
            $salesOrders->toArray()
        );

        return $data;
    }

    public function getTransferInfo($class, $attributes)
    {
        // $procurementOrders = ProcurementOrder::query()
        //     ->where('transfer_type', $class)
        //     ->where('transfer_order_no', $attributes['id'])
        //     ->get();

        $purchaseOrders = PurchaseOrder::query()
            ->where('transfer_type', $class)
            ->where('transfer_order_no', $attributes['id'])
            ->get();

        $quotationOrders = QuotationOrder::query()
            ->where('transfer_type', $class)
            ->where('transfer_order_no', $attributes['id'])
            ->get();

        $subscriberOrders = SubscriberOrder::query()
            ->where('transfer_type', $class)
            ->where('transfer_order_no', $attributes['id'])
            ->get();

        $salesOrders = SalesOrder::query()
            ->where('transfer_type', $class)
            ->where('transfer_order_no', $attributes['id'])
            ->get();

        $data = array_merge(
            // $procurementOrders->toArray(),
            $purchaseOrders->toArray(),
            $quotationOrders->toArray(),
            $subscriberOrders->toArray(),
            $salesOrders->toArray()
        );

        return $data;
    }

    /**
     * 更新轉單訂單
     *
     * @param  mixed $record
     * @param  mixed $attributes
     * @return void
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
