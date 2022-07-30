<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Models\CustomerManufacturer;
use App\Models\Storehouse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data = tap(
            CustomerManufacturer::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('category', 'currency', 'creator', 'editor');
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
        $this->authorize('customer_manufacturers.add');

        $data = $request->validate([
            'customer_manufacturer_category_id'     => 'required|exists:customer_manufacturer_categories,id',
            'currency_id'                           => 'nullable|exists:currencies,id',
            'code'                                  => 'required|unique:customer_manufacturers',
            'type'                                  => 'required|string',
            'full_name'                             => 'required|unique:customer_manufacturers',
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
            // 額外 data 資料
            'person_in_charge'                      => 'nullable|string',
            'contact_person_one'                    => 'nullable|string',
            'contact_person_two'                    => 'nullable|string',
            'phone_one'                             => 'nullable|string',
            'phone_two'                             => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturer::create($data);

            DB::commit();
            return $this->created($data);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員'.$e->getMessage());
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
            $data->load('category', 'currency', 'creator', 'editor');

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
            'code'                                  => 'required|unique:customer_manufacturers,' . $id,
            'type'                                  => 'required|string',
            'full_name'                             => 'required|unique:customer_manufacturers,' . $id,
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
            // 額外 data 資料
            'person_in_charge'                      => 'nullable|string',
            'contact_person_one'                    => 'nullable|string',
            'contact_person_two'                    => 'nullable|string',
            'phone_one'                             => 'nullable|string',
            'phone_two'                             => 'nullable|string',
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
}