<?php

namespace App\Http\Controllers;

use App\Models\PMember;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('users.read');

        /** @var \Illuminate\Database\Eloquent\Collection $data */
        $data = PMember::search($request->input('searchTerm'))
            ->tap(function ($query) use ($request) {
                foreach ($request['sort'] as $sort) {
                    if (isset($sort['field']) && isset($sort['type'])) {
                        $query->orderBy($sort['field'], $sort['type']);
                    }
                }
            })
            ->paginate($request->input('perPage'));

        $data->load('storehouse', 'staff', 'creator', 'editor');

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
        $this->authorize('users.add');

        $attributes = $request->validate([
            'staff_id'      => 'required|unique:p_members',
            'storehouse_id' => 'required|exists:storehouses,id',
            'email'         => 'required|unique:p_members',
            'password'      => 'required',
        ]);

        try {
            DB::beginTransaction();
            $data = PMember::create([
                'email'         => $attributes['email'],
                'password'      => Hash::make($attributes['password']),
                'staff_id'      => $attributes['staff_id'],
                'storehouse_id' => $attributes['storehouse_id'],
            ]);

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
        $this->authorize('users.read');

        try {
            $record = PMember::findOrFail($id);

            $data = $record->toArray();

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
        $this->authorize('users.update');

        $attributes = $request->validate([
            'staff_id'      => 'required|unique:p_members,staff_id,' . $id,
            'storehouse_id' => 'required|exists:storehouses,id',
            'email'         => 'required|unique:p_members,email,' . $id,
            'password'      => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = PMember::findOrFail($id);

            $data->update([
                'staff_id'      => $attributes['staff_id'],
                'storehouse_id' => $attributes['storehouse_id'],
                'email'         => $attributes['email'],
            ]);

            if (isset($attributes['password'])) {
                $data->update([
                    'password'  => Hash::make($attributes['password']),
                ]);
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
    public function destroy($id)
    {
        // $this->authorize('departments.delete');

        try {
            DB::beginTransaction();
            $data = PMember::findOrFail($id)->delete();

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
