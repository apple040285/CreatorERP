<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Models\Bank;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('banks.read');

        $data = tap(
            Bank::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
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
        $this->authorize('banks.add');

        $data = $request->validate([
            'code'          => 'required|unique:banks',
            'swift_code'    => 'required|unique:banks',
            'name'          => 'required|unique:banks',
            'alias'         => 'required',
            'phone'         => '',
            'rate'          => '',
            'remark'        => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Bank::create($data);

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
        $this->authorize('banks.read');

        try {
            $data = Bank::findOrFail($id);
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
        $this->authorize('banks.update');

        $data = $request->validate([
            'code'          => 'required|unique:banks,code,' . $id,
            'swift_code'    => 'required|unique:banks,swift_code,' . $id,
            'name'          => 'required|unique:banks,name,' . $id,
            'name'          => 'required',
            'phone'         => '',
            'rate'          => '',
            'remark'        => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Bank::findOrFail($id)->update($data);

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
        $this->authorize('banks.delete');

        try {
            DB::beginTransaction();
            $data = Bank::findOrFail($id)->delete();

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
