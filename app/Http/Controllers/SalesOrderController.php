<?php

namespace App\Http\Controllers;

use App\Enum\SalesOrderType;
use App\Exports\SalesOrdersExport;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('customer_manufacturers.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = SalesOrder::search(
            $request->input('searchTerm'),
            fn ($query) => $query
                ->when($request->has('columnFilters'), function ($query) use ($request) {
                    foreach ($request['columnFilters'] as $field => $value) {
                        if (empty($value)) continue;
                        if (str($value)->contains(' to ') && $split = str($value)->split('/ to /')) {
                            if (count($split) !== 2) continue;
                            $query
                                ->whereDate('sales_date', '>=', $split[0])
                                ->whereDate('sales_date', '<=', $split[1]);
                        } else {
                            if (timeCheck($value))
                                $query->whereDate($field, $value);
                            else
                                $query->where($field, $value);
                        }
                    }
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    foreach ($request['sort'] as $sort) {
                        if (isset($sort['field']) && isset($sort['type'])) {
                            $query->orderBy($sort['field'], $sort['type']);
                        }
                    }
                })
                ->where('type', SalesOrderType::銷貨)
                ->latest()
        )->paginate($request->input('perPage'));

        $data->load('customer_manufacturer', 'staff', 'creator', 'editor');

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

        $attributes = $request->validate([
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

            $record = SalesOrder::create([
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
                'status'                    => $attributes['status'],
                'status_approval'           => $attributes['status_approval'],
                'remark'                    => $attributes['remark'] ?? null,
            ]);

            if (isset($attributes['items'])) {
                proccesRelationWithRequest($record->items(), $attributes['items']);
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
            $data = SalesOrder::findOrFail($id);

            $data->load('customer_manufacturer', 'items.product', 'items.storehouse', 'creator', 'editor');

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

            $record = SalesOrder::findOrFail($id);

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
                'status'                    => $attributes['status'],
                'status_approval'           => $attributes['status_approval'],
                'remark'                    => $attributes['remark'] ?? null,
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
            $data = SalesOrder::findOrFail($id)->delete();

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

    /**
     * Excel 匯出
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        return Excel::download(new SalesOrdersExport($request->all()), '銷售查補.xls', \Maatwebsite\Excel\Excel::XLS);
    }
}
