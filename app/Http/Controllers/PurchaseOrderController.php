<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('customer_manufacturers.read');

        $data = tap(
            PurchaseOrder::search($request->input('searchTerm'))->paginate($request->input('perPage')),
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
                'purchase_date'                         => 'required',          // 進貨日期
                'customer_manufacturer_id'              => 'required',          // 客戶廠商
                'invoice_no'                            => 'nullable',          // 發票號碼
                'voucher_no'                            => 'nullable',          // 傳票號碼
                'staff_id'                              => 'required',          // 員工職員
                'department_id'                         => 'required',          // 部門
                'project_id'                            => 'nullable',          // 專案
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
                'staff_id'                  => '進貨人員',
                'department_id'             => '進貨部門',
                'currency_id'               => '幣別',
                'billing_type'              => '立帳方式',
                'tax_type'                  => '扣稅類別',
            ]
        );

        try {
            DB::beginTransaction();

            // 獲得訂單編號
            $prefix = 'PC' . date("Ymd");

            // 獲得相似的訂單編號
            $orderByNoIds = PurchaseOrder::where('purchase_order_no', 'like', "$prefix%")->pluck('purchase_order_no');

            // 獲得訂單編號最大值
            $currentMaxValue = $orderByNoIds->map(fn ($str) => intval(str_replace($prefix, '', $str)))->max() + 1;

            // 獲得訂單編號自動補四位數 0
            $currentOrderNo = $prefix . str($currentMaxValue)->padLeft(4, '0');

            // 創建訂單
            $record = PurchaseOrder::create([
                'purchase_date'             => $attributes['purchase_date'],
                'purchase_order_no'         => $currentOrderNo,
                'customer_manufacturer_id'  => $attributes['customer_manufacturer_id'],
                'staff_id'                  => $attributes['staff_id'],
                'department_id'             => $attributes['department_id'],
                'currency_id'               => $attributes['currency_id'],
                'delivery_date'             => $attributes['delivery_date'],
                'tax_type'                  => $attributes['tax_type'],
                'account_setting_method'    => $attributes['account_setting_method'],
                'project_id'                => $attributes['project_id'] ?? null,
                'deposit_amount'            => $attributes['deposit_amount'] ?? null,
                'discount_amount'           => $attributes['discount_amount'] ?? null,
                'tax_excluding_amount'      => $attributes['tax_excluding_amount'],
                'tax_amount'                => $attributes['tax_amount'],
                'total_amount'              => $attributes['total_amount'],
                'status'                    => $attributes['status'] ?? '',
                'status_approval'           => $attributes['status_approval'] ?? '',
                'remark'                    => $attributes['remark'] ?? null,
            ]);

            if (isset($attributes['items'])) {
                $mapItems = collect($attributes['items'])->map(function ($item) {
                    return [
                        'product_id'                    => $item['product_id'],
                        'storehouse_id'                 => $item['storehouse_id'],
                        'quantity'                      => $item['quantity'],
                        'price'                         => $item['price'],
                        'tax_excluding_amount'          => $item['tax_excluding_amount'] ?? 0,
                        'tax_amount'                    => $item['tax_amount'] ?? 0,
                        'amount'                        => $item['amount'],
                        'delivery_date'                 => $item['delivery_date'] ?? now(),
                        'remark'                        => $item['remark'] ?? null,
                    ];
                });

                proccesRelationWithRequest($record->items(), $mapItems->toArray());
            }

            DB::commit();
            return $this->created($record);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員');
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
            $data = PurchaseOrder::findOrFail($id);

            $data->load('items');

            return $this->success($data);
        } catch (ModelNotFoundException $e) {
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            return $this->badRequest('請聯絡管理員');
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
                'purchase_date'                         => 'required',
                'customer_manufacturer_id'              => 'required',
                'staff_id'                              => 'required',
                'department_id'                         => 'required',
                'currency_id'                           => 'required',
                'delivery_date'                         => 'required',
                'tax_type'                              => 'required',
                'account_setting_method'                => 'required',
                'project_id'                            => 'nullable',
                'deposit_amount'                        => 'nullable',
                'discount_amount'                       => 'nullable',
                'tax_excluding_amount'                  => 'required',
                'tax_amount'                            => 'required',
                'total_amount'                          => 'required',
                'status'                                => 'nullable',
                'status_approval'                       => 'nullable',
                'remark'                                => 'nullable',
                //
                'items'                                 => 'required|array',
                'items.*.product_id'                    => 'required',
                'items.*.storehouse_id'                 => 'required',
                'items.*.quantity'                      => 'required',
                'items.*.price'                         => 'required',
                'items.*.tax_excluding_amount'          => 'required',
                'items.*.tax_amount'                    => 'required',
                'items.*.amount'                        => 'required',
                'items.*.delivery_date'                 => 'required',
                'items.*.remark'                        => 'nullable',
            ],
            [],
            [
                'staff_id'                  => '進貨人員',
                'department_id'             => '進貨部門',
                'currency_id'               => '幣別',
                'delivery_date'             => '預交日期',
                'tax_type'                  => '扣稅類別',
                'account_setting_method'    => '立帳方式',
                'tax_excluding_amount'      => '未稅金額',
                'tax_amount'                => '稅金',
                'total_amount'              => '合計',
            ]
        );

        try {
            DB::beginTransaction();

            $record = PurchaseOrder::findOrFail($id);

            $record->update([
                'purchase_date'             => $attributes['purchase_date'],
                'purchase_order_no'         => date('YmdHis'),
                'customer_manufacturer_id'  => $attributes['customer_manufacturer_id'],
                'staff_id'                  => $attributes['staff_id'],
                'department_id'             => $attributes['department_id'],
                'currency_id'               => $attributes['currency_id'],
                'delivery_date'             => $attributes['delivery_date'],
                'tax_type'                  => $attributes['tax_type'],
                'account_setting_method'    => $attributes['account_setting_method'],
                'project_id'                => $attributes['project_id'] ?? null,
                'deposit_amount'            => $attributes['deposit_amount'] ?? null,
                'discount_amount'           => $attributes['discount_amount'] ?? null,
                'tax_excluding_amount'      => $attributes['tax_excluding_amount'],
                'tax_amount'                => $attributes['tax_amount'],
                'total_amount'              => $attributes['total_amount'],
                'status'                    => $attributes['status'] ?? '',
                'status_approval'           => $attributes['status_approval'] ?? '',
                'remark'                    => $attributes['remark'] ?? null,
            ]);

            if (isset($attributes['items'])) {
                $mapItems = collect($attributes['items'])->map(function ($item) {
                    return [
                        'product_id'                    => $item['product_id'],
                        'storehouse_id'                 => $item['storehouse_id'],
                        'quantity'                      => $item['quantity'],
                        'price'                         => $item['price'],
                        'tax_excluding_amount'          => $item['tax_excluding_amount'] ?? 0,
                        'tax_amount'                    => $item['tax_amount'] ?? 0,
                        'amount'                        => $item['amount'],
                        'delivery_date'                 => $item['delivery_date'] ?? now(),
                        'remark'                        => $item['remark'] ?? null,
                    ];
                });

                proccesRelationWithRequest($record->items(), $mapItems->toArray());
            }

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員');
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
        // $this->authorize('customer_manufacturers.delete');

        try {
            DB::beginTransaction();
            $data = PurchaseOrder::findOrFail($id)->delete();

            DB::commit();
            return $this->success('刪除成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員');
        }
    }
}
