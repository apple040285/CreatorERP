<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Models\CustomerManufacturerCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerManufacturerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('customer_manufacturer_categories.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = CustomerManufacturerCategory::search($request->input('searchTerm'))
            ->tap(function ($query) use ($request) {
                foreach ($request['sort'] as $sort) {
                    if (isset($sort['field']) && isset($sort['type'])) {
                        $query->orderBy($sort['field'], $sort['type']);
                    }
                }
            })
            ->paginate($request->input('perPage'));

        $data->load('creator', 'editor');

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $attributes = $request->validate([
            'type'    => 'nullable',
        ]);

        $data = CustomerManufacturerCategory::query()
            ->where('type', $attributes['type'] ?? null)
            ->get();

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
        $this->authorize('customer_manufacturer_categories.add');

        $data = $request->validate([
            'code'              => 'required|unique:customer_manufacturer_categories',
            'type'              => 'required',
            'name'              => 'required|unique:customer_manufacturer_categories',
            'alias'             => 'nullable|string',
            'remark'            => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturerCategory::create($data);

            DB::commit();
            return $this->created($data);
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
        $this->authorize('customer_manufacturer_categories.read');

        try {
            $data = CustomerManufacturerCategory::findOrFail($id);
            $data->load('creator', 'editor');

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
        $this->authorize('customer_manufacturer_categories.update');

        $data = $request->validate([
            'code'              => 'required|unique:customer_manufacturer_categories,code,' . $id,
            'type'              => 'required',
            'name'              => 'required|unique:customer_manufacturer_categories,name,' . $id,
            'alias'             => 'nullable|string',
            'remark'            => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturerCategory::findOrFail($id)->update($data);

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
        $this->authorize('customer_manufacturer_categories.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = CustomerManufacturerCategory::findOrFail($id)->update([
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
        $this->authorize('customer_manufacturer_categories.delete');

        try {
            DB::beginTransaction();
            $data = CustomerManufacturerCategory::findOrFail($id)->delete();

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
