<?php

namespace App\Http\Controllers;

use App\Concerns\WithTransferOrderNo;
use App\Enum\PermissionNames;
use App\Models\ProcurementOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcurementOrderController extends Controller
{
    use WithTransferOrderNo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('customer_manufacturers.read');

        $data = tap(
            ProcurementOrder::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('customer_manufacturer', 'staff', 'project', 'items', 'creator', 'editor');
                return $paginatedInstance->setCollection($sortCollection);
            }
        );

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $data = ProcurementOrder::with('customer_manufacturer')->get(['id', 'procurement_order_no', 'customer_manufacturer_id']);

        return $this->success($data);
    }

    public function transfers(Request $request)
    {
        $attributes = $request->validate([
            'id'    => 'required|exists:App\Models\ProcurementOrder,id',
        ]);

        $data = $this->getTransferInfo(ProcurementOrder::class, $attributes);

        return $this->success($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('customer_manufacturers.add');

        $attributes = $request->validate(
            [
                'procurement_date'                      => 'required',                      // 採購日期
                'transfer_type'                         => 'nullable',                      // 轉入單號類型
                'transfer_order_no'                     => 'required_with:transfer_type',   // 轉入單號
                'transfer_type'                         => 'nullable',                      // 轉入單號類型
                'transfer_order_no'                     => 'nullable',                      // 轉入單號
                'customer_manufacturer_id'              => 'required',                      // 客戶廠商
                'staff_id'                              => 'required',                      // 員工職員
                'department_id'                         => 'required',                      // 部門
                'project_id'                            => 'nullable',                      // 專案
                'deposit_amount'                        => 'nullable',                      // 訂金
                'delivery_date'                         => 'nullable',                      // 預交日期
                'billing_type'                          => 'required',                      // 立帳方式
                'tax_type'                              => 'required',                      // 扣稅類別
                'currency_id'                           => 'required',                      // 幣別
                'remark'                                => 'nullable',                      // 備註
                //
                'items'                                 => 'required|array',
                'items.*.product_id'                    => 'required',
                'items.*.storehouse_id'                 => 'required',
                'items.*.quantity'                      => 'required',
                'items.*.price'                         => 'required',
                'items.*.delivery_date'                 => 'required',
                'items.*.remark'                        => 'nullable',
            ],
            [],
            [
                'staff_id'                  => '採購人員',
                'department_id'             => '採購部門',
                'currency_id'               => '幣別',
                'billing_type'              => '立帳方式',
                'tax_type'                  => '扣稅類別',
            ]
        );

        try {
            DB::beginTransaction();

            // 獲得訂單編號
            $prefix = 'PO' . date("Ymd");

            // 獲得相似的訂單編號
            $orderByNoIds = ProcurementOrder::where('procurement_order_no', 'like', "$prefix%")->pluck('procurement_order_no');

            // 獲得訂單編號最大值
            $currentMaxValue = $orderByNoIds->map(fn ($str) => intval(str_replace($prefix, '', $str)))->max() + 1;

            // 獲得訂單編號自動補四位數 0
            $currentOrderNo = $prefix . str($currentMaxValue)->padLeft(4, '0');

            // 項目小計計算
            $subtotal = collect($attributes['items'])->reduce(function ($carry, $item) {
                return $carry + ($item['quantity'] * $item['price']);
            }, 0);

            // 立帳方式
            switch ($attributes['tax_type']) {
                case 'taxFree':
                    // 不計稅
                    $tax_excluding_amount = round($subtotal);
                    $tax_amount = 0;
                    $total_amount = round($subtotal);
                    break;
                case 'taxableIncluded':
                    // 內含稅
                    $tax_excluding_amount = round($subtotal / 1.05);
                    $tax_amount = $subtotal - $tax_excluding_amount;
                    $total_amount = round($subtotal);
                    break;
                case 'taxablePlus':
                    // 稅金外加
                    $tax_excluding_amount = round($subtotal);
                    $tax_amount = round($subtotal * 0.05);
                    $total_amount = round($subtotal * 1.05);
                    break;
                default:
                    throw new \Exception('立帳方式類型不存在.');
            }
            // 寫入訂單
            $record = ProcurementOrder::create([
                'procurement_date'          => $attributes['procurement_date'],
                'procurement_order_no'      => $currentOrderNo,
                'customer_manufacturer_id'  => $attributes['customer_manufacturer_id'],
                'staff_id'                  => $attributes['staff_id'],
                // 'delivery_date'             => $attributes['delivery_date'],
                'department_id'             => $attributes['department_id'],
                'currency_id'               => $attributes['currency_id'],
                'billing_type'              => $attributes['billing_type'],
                'tax_type'                  => $attributes['tax_type'],
                'project_id'                => $attributes['project_id'] ?? null,
                'deposit_amount'            => $attributes['deposit_amount'] ?? 0,
                'tax_excluding_amount'      => $tax_excluding_amount,
                'tax_amount'                => $tax_amount,
                'total_amount'              => $total_amount,
                'status'                    => $attributes['status'] ?? '',
                'status_approval'           => $attributes['status_approval'] ?? '',
                'remark'                    => $attributes['remark'] ?? null,
            ]);

            // 寫入訂單項目
            if (isset($attributes['items'])) {
                $mapItems = collect($attributes['items'])->map(function ($item) {
                    return [
                        'product_id'                    => $item['product_id'],
                        'storehouse_id'                 => $item['storehouse_id'],
                        'quantity'                      => $item['quantity'],
                        'price'                         => $item['price'],
                        'amount'                        => $item['quantity'] * $item['price'],
                        'delivery_date'                 => $item['delivery_date'],
                        'remark'                        => $item['remark'] ?? null,
                    ];
                });

                $this->proccesRelationWithRequest($record->items(), $mapItems->toArray());
            }

            // 判斷是否有轉單建立
            if (isset($attributes['transfer_type']) && isset($attributes['transfer_order_no'])) {
                $this->updateTransferOrderNo($record, $attributes);
            }

            DB::commit();
            return $this->created($record);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $this->authorize('customer_manufacturers.read');

        try {
            $record = ProcurementOrder::findOrFail($id);

            $record->load('purchase_orders.items', 'items.product');

            $data = $record->toArray();

            $data['order_no'] = $record->procurement_order_no;

            // 撈出所有轉出單據集合中值的出現次數
            $product_ids = $record->purchase_orders->pluck('items')->flatten()->countBy('product_id')->toArray();

            // 迴圈處理訂單明細項目
            foreach ($data['items'] as $key => &$item) {
                // 已轉數量
                $item['transferred_quantity'] = $product_ids[$item['product_id']] ?? 0;
                // 未轉數量
                $item['untransferred_quantity'] = $item['quantity'] - $item['transferred_quantity'];
            }

            return $this->success($data);
        } catch (ModelNotFoundException $e) {
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->authorize('customer_manufacturers.update');

        $attributes = $request->validate(
            [
                'procurement_date'                      => 'required',          // 採購日期
                'customer_manufacturer_id'              => 'required',          // 客戶廠商
                'staff_id'                              => 'required',          // 員工職員
                'department_id'                         => 'required',          // 部門
                'project_id'                            => 'nullable',          // 專案
                'deposit_amount'                        => 'nullable',          // 訂金
                'delivery_date'                         => 'nullable',          // 預交日期
                'billing_type'                          => 'required',          // 立帳方式
                'tax_type'                              => 'required',          // 扣稅類別
                'currency_id'                           => 'required',          // 幣別
                'remark'                                => 'nullable',          // 備註
                //
                'items'                                 => 'required|array',
                'items.*.product_id'                    => 'required',
                'items.*.storehouse_id'                 => 'required',
                'items.*.quantity'                      => 'required',
                'items.*.price'                         => 'required',
                'items.*.delivery_date'                 => 'required',
                'items.*.remark'                        => 'nullable',
            ],
            [],
            [
                'staff_id'                  => '採購人員',
                'department_id'             => '採購部門',
                'currency_id'               => '幣別',
                'billing_type'              => '立帳方式',
                'tax_type'                  => '扣稅類別',
                'items'                     => '產品資訊',
            ]
        );

        try {
            DB::beginTransaction();

            $record = ProcurementOrder::findOrFail($id);

            // 項目小計計算
            $subtotal = collect($attributes['items'])->reduce(function ($carry, $item) {
                return $carry + ($item['quantity'] * $item['price']);
            }, 0);

            // 立帳方式
            switch ($attributes['tax_type']) {
                case 'taxFree':
                    // 不計稅
                    $tax_excluding_amount = round($subtotal);
                    $tax_amount = 0;
                    $total_amount = round($subtotal);
                    break;
                case 'taxableIncluded':
                    // 內含稅
                    $tax_excluding_amount = round($subtotal / 1.05);
                    $tax_amount = $subtotal - $tax_excluding_amount;
                    $total_amount = round($subtotal);
                    break;
                case 'taxablePlus':
                    // 稅金外加
                    $tax_excluding_amount = round($subtotal);
                    $tax_amount = round($subtotal * 0.05);
                    $total_amount = round($subtotal * 1.05);
                    break;
                default:
                    throw new \Exception('立帳方式類型不存在.');
            }

            // 更新訂單
            $record->update([
                'procurement_date'          => $attributes['procurement_date'],
                'customer_manufacturer_id'  => $attributes['customer_manufacturer_id'],
                'staff_id'                  => $attributes['staff_id'],
                'delivery_date'             => $attributes['delivery_date'],
                'department_id'             => $attributes['department_id'],
                'currency_id'               => $attributes['currency_id'],
                'billing_type'              => $attributes['billing_type'],
                'deposit_amount'            => $attributes['deposit_amount'] ?? 0,
                'tax_type'                  => $attributes['tax_type'],
                'project_id'                => $attributes['project_id'] ?? null,
                'tax_excluding_amount'      => $tax_excluding_amount,
                'tax_amount'                => $tax_amount,
                'total_amount'              => $total_amount,
                'remark'                    => $attributes['remark'] ?? null,
            ]);

            // 更新訂單項目
            if (isset($attributes['items'])) {
                $mapItems = collect($attributes['items'])->map(function ($item) {
                    return [
                        'product_id'                    => $item['product_id'],
                        'storehouse_id'                 => $item['storehouse_id'],
                        'quantity'                      => $item['quantity'],
                        'price'                         => $item['price'],
                        'amount'                        => $item['quantity'] * $item['price'],
                        'delivery_date'                 => $item['delivery_date'],
                        'remark'                        => $item['remark'] ?? null,
                    ];
                });

                $this->proccesRelationWithRequest($record->items(), $mapItems->toArray());
            }

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->authorize(PermissionNames::刪除採購作業->value);

        try {
            DB::beginTransaction();

            $record = ProcurementOrder::findOrFail($id);

            $record->loadCount('purchase_orders');

            if ($record->purchase_orders_count > 0) throw new \Exception('單據已轉出無法進行刪除.');

            $record->delete();

            DB::commit();
            return $this->success('刪除成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
        }
    }
}
