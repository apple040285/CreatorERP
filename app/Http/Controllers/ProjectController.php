<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('projects.read');

        $data = tap(
            Project::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('creator', 'editor');
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
        $this->authorize('projects.add');

        $data = $request->validate([
            'code'      => 'required|unique:departments',
            'name'      => 'required|unique:departments',
            'remark'    => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Project::create($data);

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
        $this->authorize('projects.read');

        try {
            $data = Project::findOrFail($id);

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
        $this->authorize('projects.update');

        $data = $request->validate([
            'code'      => 'required|unique:projects,code,' . $id,
            'name'      => 'required|unique:projects,name,' . $id,
            'remark'    => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Project::findOrFail($id)->update($data);

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
        $this->authorize('projects.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = Project::findOrFail($id)->update([
                'status' => $data['status'],
                'disable_at' => $data['status'] === StatusEnum::停用 ? now() : null,
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
        $this->authorize('projects.delete');

        try {
            DB::beginTransaction();
            $data = Project::findOrFail($id)->delete();

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
