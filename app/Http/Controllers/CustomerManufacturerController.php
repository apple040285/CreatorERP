<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Exports\CustomerManufacturersExport;
use App\Imports\CustomerManufacturersImport;
use App\Models\CustomerManufacturer;
use App\Models\Storehouse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CustomerManufacturerController extends Controller
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
        $data = CustomerManufacturer::search($request->input('searchTerm'))
            ->when($request->has('columnFilters'), function ($query) use ($request) {
                foreach ($request['columnFilters'] as $field => $value) {
                    $query->where($field, $value);
                }
            })
            ->when($request->has('sort'), function ($query) use ($request) {
                foreach ($request['sort'] as $sort) {
                    if (isset($sort['field']) && isset($sort['type'])) {
                        $query->orderBy($sort['field'], $sort['type']);
                    }
                }
            })
            ->paginate($request->input('perPage'));

        $data->load('category', 'currency', 'staff',  'creator', 'editor');

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $data = CustomerManufacturer::get();

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
        $this->authorize('customer_manufacturers.add');

        $data = $request->validate([
            'customer_manufacturer_category_id'     => 'required|exists:customer_manufacturer_categories,id',
            'currency_id'                           => 'nullable|exists:currencies,id',
            'staff_id'                              => 'nullable|exists:staff,id',
            'code'                                  => 'required|unique:customer_manufacturers',
            'type'                                  => 'required|string',
            'full_name'                             => 'required|unique:customer_manufacturers',
            'short_name'                            => 'nullable|string',
            'alias'                                 => 'nullable|string',
            'email'                                 => 'nullable|string',
            'fax'                                   => 'nullable|string',
            'unicode'                               => 'nullable|string',
            'payment_type'                          => 'nullable|string',   // payment_method
            'invoice_type'                          => 'nullable|string',   // electronic_invoice_type
            'invoice_name'                          => 'nullable|string',
            'invoice_address'                       => 'nullable|string',
            'company_address'                       => 'nullable|string',
            'zip_code'                              => 'nullable|string',
            'remark'                                => 'nullable|string',
            // 額外 data 資料
            'person_in_charge'                      => 'nullable|string',
            'contact_person_one'                    => 'nullable|string',
            'contact_person_two'                    => 'nullable|string',
            'phone_one'                             => 'nullable|string',
            'phone_two'                             => 'nullable|string',
            'industry'                              => 'nullable',          // 行業別
            'tax_deduction_category'                => 'nullable|string',   // 扣稅類別
            'account_setting_method'                => 'nullable|string',   // 立帳方式
            'business_people'                       => 'nullable|string',   // 業務人員
            'monthly_billing_date'                  => 'nullable|string',   // 每月結帳日
            'days'                                  => 'nullable|string',   // 天數
            'other_instructions'                    => 'nullable|string',   // 其他說明
            'address'                               => 'nullable|array',    // 地址
            'address.*.address_name'                => 'nullable|string',
            'address.*.postal_code'                 => 'nullable|string',
            'address.*.address'                     => 'nullable|string',
            'address.*.contact_person'              => 'nullable|string',
            'address.*.telephone'                   => 'nullable|string',
            'address.*.cellphone'                   => 'nullable|string',
            'address.*.line'                        => 'nullable|string',
            'address.*.email'                       => 'nullable|string',
            'address.*.department_name'             => 'nullable|string',
            'address.*.remark'                      => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturer::create($data);

            DB::commit();
            return $this->created($data);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員' . $e->getMessage());
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
            $data = CustomerManufacturer::findOrFail($id);
            $data->load('category', 'currency', 'staff',  'creator', 'editor');

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
        $this->authorize('customer_manufacturers.update');

        $data = $request->validate([
            'customer_manufacturer_category_id'     => 'required|exists:customer_manufacturer_categories,id',
            'currency_id'                           => 'nullable|exists:currencies,id',
            'staff_id'                              => 'nullable|exists:staff,id',
            'code'                                  => 'required|unique:customer_manufacturers,code,' . $id,
            'type'                                  => 'required|string',
            'full_name'                             => 'required|unique:customer_manufacturers,full_name,' . $id,
            'short_name'                            => 'nullable|string',
            'alias'                                 => 'nullable|string',
            'email'                                 => 'nullable|string',
            'fax'                                   => 'nullable|string',
            'unicode'                               => 'nullable|string',
            'payment_type'                          => 'nullable|string',
            'invoice_type'                          => 'nullable|string',
            'invoice_name'                          => 'nullable|string',
            'invoice_address'                       => 'nullable|string',
            'company_address'                       => 'nullable|string',
            'zip_code'                              => 'nullable|string',
            'remark'                                => 'nullable|string',
            // 額外 data 資料
            'person_in_charge'                      => 'nullable|string',
            'contact_person_one'                    => 'nullable|string',
            'contact_person_two'                    => 'nullable|string',
            'phone_one'                             => 'nullable|string',
            'phone_two'                             => 'nullable|string',
            'industry'                              => 'nullable',          // 行業別
            'tax_deduction_category'                => 'nullable|string',   // 扣稅類別
            'account_setting_method'                => 'nullable|string',   // 立帳方式
            'monthly_billing_date'                  => 'nullable|string',   // 每月結帳日
            'days'                                  => 'nullable|string',   // 天數
            'other_instructions'                    => 'nullable|string',   // 其他說明
            'address'                               => 'nullable|array',    // 地址
            'address.*.address_name'                => 'nullable|string',
            'address.*.postal_code'                 => 'nullable|string',
            'address.*.address'                     => 'nullable|string',
            'address.*.contact_person'              => 'nullable|string',
            'address.*.telephone'                   => 'nullable|string',
            'address.*.cellphone'                   => 'nullable|string',
            'address.*.line'                        => 'nullable|string',
            'address.*.email'                       => 'nullable|string',
            'address.*.department_name'             => 'nullable|string',
            'address.*.remark'                      => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturer::findOrFail($id)->update($data);

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
     * Update the status resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $this->authorize('customer_manufacturers.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturer::findOrFail($id)->update([
                'status'        => $data['status'],
                'disable_at'    => $data['status'] === StatusEnum::停用->value ? now() : null,
            ]);

            DB::commit();
            return $this->success('狀態更新成功');
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
        $this->authorize('customer_manufacturers.delete');

        try {
            DB::beginTransaction();
            $data = CustomerManufacturer::findOrFail($id)->delete();

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
        return Excel::download(new CustomerManufacturersExport, 'customer-manufacturers.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    /**
     * Excel 匯入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        Excel::import(new CustomerManufacturersImport, request()->file('file'));

        return $this->success($data = '匯入成功');
    }
}
