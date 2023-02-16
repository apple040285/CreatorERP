<?php

namespace App\Http\Controllers;

use App\Models\RequisitionsOrder;
use App\Models\RequisitionsOrderItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequisitionsOrderController extends Controller
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
            RequisitionsOrder::search($request->input('searchTerm'))->paginate($request->input('perPage')),
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
    //新增
    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'quotation_date'                        => 'required',
                'quotation_order_no'                    => 'required',
                'customer_id'                           => 'required',
                'transferNo_id'                         => 'nullable',
                'businessPeople_id'                     => 'nullable',
                'quotationDepartment_id'                => 'nullable',
                'currency_id'                           => 'required',
                'effective_date'                        => 'required',
                'expiration_date'                       => 'required',
                'tax_type'                              => 'nullable',
                'project_naem'                          => 'nullable',
                'customerReservation'                   => 'nullable',
                'project_id'                            => 'nullable',
                'untaxedlocalcurrency'                  => 'required',
                'localcurrencytax'                      => 'required',
                'totallocalcurrency'                    => 'required',
                'status'                                => 'nullable',
                'status_approval'                       => 'nullable',
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
                'staff_id'                  => '訂購人員',
                'department_id'             => '訂購部門',
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

            $record = RequisitionsOrder::create([
                'quotation_date'            => $attributes['quotation_date'],
                'quotation_order_no'        => date('YmdHis'),
                'customer_id'               => $attributes['customer_id'],
                'businessPeople_id'         => $attributes['businessPeople_id'],
                'transferNo_id'             => $attributes['transferNo_id'] ?? '',
                'quotationDepartment_id'    => $attributes['quotationDepartment_id'],
                'currency_id'               => $attributes['currency_id'],
                'effective_date'            => $attributes['effective_date'],
                'expiration_date'           => $attributes['expiration_date'],
                'tax_type'                  => $attributes['tax_type'],
                'customerReservation'       => $attributes['customerReservation'],
                'project_naem'              => $attributes['project_naem'] ?? null,
                'project_id'                => $attributes['project_id'] ?? null,
                'untaxedlocalcurrency'      => $attributes['untaxedlocalcurrency'] ?? null,
                'localcurrencytax'          => $attributes['localcurrencytax'] ?? null,
                'totallocalcurrency'        => $attributes['totallocalcurrency'],
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
            return $this->badRequest($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //資料
    public function show(Request $request, $id)
    {
        $this->authorize('customer_manufacturers.read');

        try {
            $data = RequisitionsOrder::findOrFail($id);
            // $data->load('category', 'currency', 'creator', 'editor');

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

        $attributes = $request->validate([
            'quotation_date'                        => 'required',
            'quotation_order_no'                    => 'required',
            'transferNo_id'                         => 'required',
            'customer_id'                           => 'required',
            'businessPeople_id'                     => 'required',
            'quotationDepartment_id'                => 'required',
            'currency_id'                           => 'required',
            'effective_date'                        => 'required',
            'expiration_date'                       => 'required',
            'tax_type'                              => 'nullable',
            'project_naem'                          => 'nullable',
            'customerReservation'                   => 'nullable',
            'project_id'                            => 'required',
            'untaxedlocalcurrency'                  => 'required',
            'localcurrencytax'                      => 'required',
            'totallocalcurrency'                    => 'required',
            'status'                                => 'required',
            'status_approval'                       => 'required',
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
        ]);

        try {
            DB::beginTransaction();

            $record = RequisitionsOrder::findOrFail($id);

            $record->update([
                'quotation_date'            => $attributes['quotation_date'],
                'quotation_order_no'        => date('YmdHis'),
                'customer_id'               => $attributes['customer_id'],
                'transferNo_id'             => $attributes['transferNo_id'],
                'project_naem'              => $attributes['project_naem'],
                'businessPeople_id'         => $attributes['businessPeople_id'],
                'quotationDepartment_id'    => $attributes['quotationDepartment_id'],
                'currency_id'               => $attributes['currency_id'],
                'effective_date'            => $attributes['effective_date'],
                'expiration_date'           => $attributes['expiration_date'],
                'tax_type'                  => $attributes['tax_type'],
                'customerReservation'       => $attributes['customerReservation'],
                'project_id'                => $attributes['project_id'] ?? null,
                'untaxedlocalcurrency'      => $attributes['untaxedlocalcurrency'] ?? null,
                'localcurrencytax'          => $attributes['localcurrencytax'] ?? null,
                'totallocalcurrency'        => $attributes['totallocalcurrency'],
                'status'                    => $attributes['status'],
                'status_approval'           => $attributes['status_approval'],
                'remark'                    => $attributes['remark'] ?? null,

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
            ]);

            if (isset($attributes['items'])) {
                proccesRelationWithRequest($record->items(), $attributes['items']);
            }

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員ABC');
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
            $data = RequisitionsOrder::findOrFail($id)->delete();

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
