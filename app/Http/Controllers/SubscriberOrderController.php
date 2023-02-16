<?php

namespace App\Http\Controllers;

use App\Models\SubscriberOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberOrderController extends Controller
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
            SubscriberOrder::search($request->input('searchTerm'))->paginate($request->input('perPage')),
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
                'remark'                                => 'nullable',
                //
                'items'                                 => 'required|array',
                'items.*.product_id'                    => 'required',
                'items.*.storehouse_id'                 => 'required',
                'items.*.quantity'                      => 'required',
                'items.*.price'                         => 'required',
                'items.*.tax_excluding_amount'          => 'nullable',
                'items.*.tax_amount'                    => 'nullable',
                'items.*.amount'                        => 'required',
                'items.*.delivery_date'                 => 'nullable',
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

            $record = SubscriberOrder::create([
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
            $data = SubscriberOrder::findOrFail($id);

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

            $record = SubscriberOrder::findOrFail($id);

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
            $data = SubscriberOrder::findOrFail($id)->delete();

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
