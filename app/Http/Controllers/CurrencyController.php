<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('currencies.read');

        $data = tap(
            Currency::search($request->input('searchTerm'))->paginate($request->input('perPage')),
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

    public function options(Request $request)
    {
        $data = Currency::get();

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
        $this->authorize('currencies.add');

        $data = $request->validate([
            'source_code'           => 'required|unique:currencies',
            'target_code'           => 'required|unique:currencies',
            'name'                  => 'required|unique:currencies',
            'rate'                  => 'required',
            'buying_rate'           => 'nullable',
            'selling_rate'          => 'nullable',
            'unit_price_of_digits'  => 'nullable',
            'amount_of_digits'      => 'nullable',
            'remark'                => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Currency::create($data);

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
        $this->authorize('currencies.read');

        try {
            $data = Currency::findOrFail($id);

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
        $this->authorize('currencies.update');

        $data = $request->validate([
            'source_code'           => 'required|unique:currencies,source_code,' . $id,
            'target_code'           => 'required|unique:currencies,target_code,' . $id,
            'name'                  => 'required|unique:currencies,name,' . $id,
            'rate'                  => 'required',
            'buying_rate'           => 'nullable',
            'selling_rate'          => 'nullable',
            'unit_price_of_digits'  => 'nullable',
            'amount_of_digits'      => 'nullable',
            'remark'                => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $data = Currency::findOrFail($id)->update($data);

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
        $this->authorize('currencies.delete');

        try {
            DB::beginTransaction();
            $data = Currency::findOrFail($id)->delete();

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
