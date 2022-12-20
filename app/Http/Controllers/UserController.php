<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $data = User::search(
            $request->input('searchTerm'),
            fn ($query) => $query
                ->when($request->has('sort'), function ($query) use ($request) {
                    foreach ($request['sort'] as $sort) {
                        if (isset($sort['field']) && isset($sort['type'])) {
                            $query->orderBy($sort['field'], $sort['type']);
                        }
                    }
                })
                ->when(
                    !in_array(auth()->user()->email, ['admin@gmail.com']),
                    fn ($query) => $query->whereNotIn('email', ['admin@gmail.com'])
                )
        )->paginate($request->input('perPage'));

        $data->load('roles', 'creator', 'editor');

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
            'name'          => 'required|unique:users,name',
            'email'         => 'required|unique:users,email',
            'password'      => 'required',
            'roles'         => 'nullable|array',
            'role_id'       => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $record = User::create([
                'name'      => $attributes['name'],
                'email'     => $attributes['email'],
                'password'  => Hash::make($attributes['password']),
            ]);

            if (isset($attributes['role_id'])) {
                $record->syncRoles([$attributes['role_id']]);
            } else {
                $record->syncRoles($attributes['roles'] ?? []);
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
        $this->authorize('users.read');

        try {
            $record = User::findOrFail($id);

            $record->load('roles');

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
            'name'          => 'required|unique:users,name,' . $id,
            'email'         => 'required|unique:users,email,' . $id,
            'roles'         => 'nullable|array',
            'role_id'       => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $record = User::findOrFail($id);

            $record->update([
                'name'      => $attributes['name'],
                'email'     => $attributes['email'],
            ]);

            if (isset($attributes['role_id'])) {
                $record->syncRoles([$attributes['role_id']]);
            } else {
                $record->syncRoles($attributes['roles'] ?? []);
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
        // $this->authorize('departments.delete');

        try {
            DB::beginTransaction();
            $data = User::findOrFail($id)->delete();

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
