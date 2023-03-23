<?php

namespace App\Http\Controllers;

use App\Concerns\WithTransferOrderNo;
use App\Enum\StatusEnum;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    use WithTransferOrderNo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('projects.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = Project::search($request->input('searchTerm'))
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
        $data = Project::get();

        return $this->success($data);
    }

    public function relationships(Request $request)
    {
        $attributes = $request->validate([
            'project_id'    => 'required|exists:App\Models\Project,id',
        ]);

        $data = $this->getProjectOrders($attributes['project_id']);

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
            'code'              => 'required|unique:projects',
            'name'              => 'required|unique:projects',
            'invalid_at'        => 'nullable|date',
            'estimated_profit'  => 'nullable',
            'remark'            => 'nullable',
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
            $record = Project::findOrFail($id);

            $data = $record->toArray();

            // 計算
            $projectOrders = $this->getProjectOrders($id);

            // 全部銷貨
            $salesSum = collect($projectOrders)
                ->filter(fn ($item) => $item['document_type'] === '銷貨憑單')
                ->sum('total_amount');

            // 全部進貨
            $purchaseSum = collect($projectOrders)
                ->filter(fn ($item) => $item['document_type'] === '進貨憑單')
                ->sum('total_amount');

            // 毛利 = 全部銷貨' - 全部進貨  實際總額
            $data['gross_profit'] = $salesSum - $purchaseSum;

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

        $attributes = $request->validate([
            'code'              => 'required|unique:projects,code,' . $id,
            'name'              => 'required|unique:projects,name,' . $id,
            'invalid_at'        => 'nullable|date',
            'estimated_profit'  => 'nullable',
            'actual_total'      => 'nullable',
            'remark'            => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $record = Project::findOrFail($id);

            $record->update([
                'code'              => $attributes['code'],
                'name'              => $attributes['name'],
                'invalid_at'        => $attributes['invalid_at'] ?? null,
                'estimated_profit'  => $attributes['estimated_profit'] ?? null,
                'actual_total'      => $attributes['actual_total'] ?? null,
                'remark'            => $attributes['remark'] ?? null,
            ]);

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
