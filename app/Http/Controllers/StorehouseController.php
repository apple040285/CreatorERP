<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Exports\StorehousesExport;
use App\Imports\StorehousesImport;
use App\Models\Storehouse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StorehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('storehouses.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = Storehouse::search($request->input('searchTerm'))
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

        $data->load('creator', 'editor');

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $data = Storehouse::whereStatus(StatusEnum::啟用->value)->get();

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
        $this->authorize('storehouses.add');

        $data = $request->validate([
            'code'              => 'required|unique:storehouses',
            'name'              => 'required|unique:storehouses',
            'contact_person'    => 'nullable|string',
            'phone'             => 'nullable|string',
            'fax'               => 'nullable|string',
            'address'           => 'nullable|string',
            'remark'            => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = Storehouse::create($data);

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
        $this->authorize('storehouses.read');

        try {
            $data = Storehouse::findOrFail($id);
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
        $this->authorize('storehouses.update');

        $data = $request->validate([
            'code'              => 'required|string|unique:storehouses,code,' . $id,
            'name'              => 'required|string|unique:storehouses,name,' . $id,
            'contact_person'    => 'nullable|string',
            'phone'             => 'nullable|string',
            'fax'               => 'nullable|string',
            'address'           => 'nullable|string',
            'remark'            => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = Storehouse::findOrFail($id)->update($data);

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
        $this->authorize('storehouses.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = Storehouse::findOrFail($id)->update([
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
        $this->authorize('storehouses.delete');

        try {
            DB::beginTransaction();
            $data = Storehouse::findOrFail($id)->delete();

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
        return Excel::download(new StorehousesExport, 'storehouses.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    /**
     * Excel 匯入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        Excel::import(new StorehousesImport, request()->file('file'));

        return $this->success($data = '匯入成功');
    }
}
