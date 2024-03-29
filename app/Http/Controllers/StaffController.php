<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Exports\StaffsExport;
use App\Imports\StaffsImport;
use App\Models\Staff;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('staffs.read');

        $data = tap(
            Staff::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('department', 'job', 'creator', 'editor');
                return $paginatedInstance->setCollection($sortCollection);
            }
        );

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $data = Staff::get();

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
        $this->authorize('staffs.add');

        $data = $request->validate([
            'department_id'         => 'required|exists:departments,id',
            'job_id'                => 'required|exists:jobs,id',
            'code'                  => 'required|unique:staff',
            'name'                  => 'required|unique:staff',
            'email'                 => 'nullable|unique:staff',
            'alias'                 => 'nullable|unique:staff',
            'telephone'             => 'nullable|string',
            'cellphone'             => 'nullable|string',
            'residence_address'     => 'nullable|string',
            'mailing_address'       => 'nullable|string',
            'arrival_date'          => 'required|date',
            'resignation_date'      => 'nullable|date',
            'remark'                => 'nullable|string',
            // Custom Columns
            'emergency_contact_one'             => 'required|string',
            'emergency_contact_one_number'      => 'required|string',
            'emergency_contact_two'             => 'nullable|string',
            'emergency_contact_two_number'      => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = Staff::create($data);

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
        $this->authorize('staffs.read');

        try {
            $data = Staff::findOrFail($id);
            $data->load('creator', 'editor', 'department', 'job');

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
        $this->authorize('staffs.update');

        $data = $request->validate([
            'department_id'         => 'required|exists:departments,id',
            'job_id'                => 'required|exists:jobs,id',
            'code'                  => 'required|unique:staff,code,' . $id,
            'name'                  => 'required|unique:staff,name,' . $id,
            'email'                 => 'nullable|unique:staff,email,' . $id,
            'alias'                 => 'nullable|unique:staff,alias,' . $id,
            'telephone'             => 'nullable|string',
            'cellphone'             => 'nullable|string',
            'residence_address'     => 'nullable|string',
            'mailing_address'       => 'nullable|string',
            'arrival_date'          => 'required|date',
            'resignation_date'      => 'nullable|date',
            'remark'                => 'nullable|string',
            // Custom Columns
            'emergency_contact_one'             => 'required|string',
            'emergency_contact_one_number'      => 'required|string',
            'emergency_contact_two'             => 'nullable|string',
            'emergency_contact_two_number'      => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = Staff::findOrFail($id)->update($data);

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            info($e->getMessage());
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
        $this->authorize('staffs.delete');

        try {
            DB::beginTransaction();
            $data = Staff::findOrFail($id)->delete();

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
        return Excel::download(new StaffsExport, 'staffs.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    /**
     * Excel 匯入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        Excel::import(new StaffsImport, request()->file('file'));

        return $this->success($data = '匯入成功');
    }
}
