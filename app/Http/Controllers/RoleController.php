<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('roles.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = Role::search($request->input('searchTerm'))
            ->tap(function ($query) use ($request) {
                foreach ($request['sort'] as $sort) {
                    if (isset($sort['field']) && isset($sort['type'])) {
                        $query->orderBy($sort['field'], $sort['type']);
                    }
                }
            })
            ->paginate($request->input('perPage'));

        $data->load('permissions:name');

        return $this->success($data);
    }

    public function options(Request $request)
    {
        $data = Role::get();

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
        $this->authorize('roles.add');

        $attributes = $request->validate([
            'name'              => 'required|unique:roles,name',
            'permissions'       => 'nullable|exists:permissions,id|array',
            'permission_names'  => 'nullable|exists:permissions,name|array',
        ]);

        try {
            DB::beginTransaction();

            $record = Role::create([
                'guard_name'    => '*',
                'name'          => $attributes['name'],
            ]);

            // 同步權限
            if (isset($attributes['permissions'])) $record->syncPermissions($attributes['permissions']);

            // 同步權限
            if (isset($attributes['permission_names'])) $record->syncPermissions($attributes['permission_names']);

            DB::commit();
            return $this->created($record);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
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
        $this->authorize('roles.read');

        try {
            $record = Role::findOrFail($id);

            $data = $record->toArray();

            // $data['permissions'] = $record->permissions->pluck('id')->toArray();

            $data['permission_names'] = $record->permissions->pluck('name')->toArray();

            return $this->success($data);
        } catch (ModelNotFoundException $e) {
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
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
        $this->authorize('roles.update');

        $attributes = $request->validate([
            'name'              => 'required|unique:roles,name,' . $id,
            // 'permissions'       => 'nullable|exists:permissions,id|array',
            'permission_names'  => 'nullable|exists:permissions,name|array',
        ]);

        try {
            DB::beginTransaction();

            $record = Role::findOrFail($id);

            $record->update([
                'guard_name'    => '*',
                'name'          => $attributes['name'],
            ]);

            // 同步權限
            // if (isset($attributes['permissions'])) $record->syncPermissions($attributes['permissions']);

            // 同步權限
            if (isset($attributes['permission_names'])) $record->syncPermissions($attributes['permission_names']);

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
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
        $this->authorize('roles.delete');

        try {
            DB::beginTransaction();
            $data = Role::findOrFail($id)->delete();

            DB::commit();
            return $this->success('刪除成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest($e->getMessage() ?: '請聯絡管理員');
        }
    }
}
