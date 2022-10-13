<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Imports\ProductsStorehousesImport;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('products.read');

        $data = tap(
            Product::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('category', 'storehouses', 'creator', 'editor');
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
        $this->authorize('products.add');

        $attributes = $request->validate([
            'product_category_id'   => 'required|exists:product_categories,id',
            'code'                  => 'required|unique:products',
            'name'                  => 'required|unique:products',
            'alias'                 => 'nullable|unique:products',
            'picture'               => 'nullable|string',
            'images'                => 'nullable|array',
            'price'                 => 'nullable|integer',
            'invoice_name'          => 'nullable|string',
            'sku'                   => 'required|string',
            'unit'                  => 'required|string',
            'barcode'               => 'nullable',
            'remark'                => 'nullable',
        ]);

        $storehouses_attributes = $request->validate([
            'storehouses.*.id'              => 'nullable|distinct|exists:storehouses,id|integer',
            'storehouses.*.stock'           => 'nullable|min:0|integer',
            'storehouses.*.safety_stock'    => 'nullable|min:0|integer',
        ]);

        try {
            DB::beginTransaction();
            $data = Product::create([
                ...$attributes,
                'price' => $attributes['price'] ?? 0,
            ]);
            $storehouses_ids = collect($storehouses_attributes['storehouses'])->mapWithKeys(fn ($item) => [$item['id'] => collect($item)->except('id')]);
            $data->storehouses()->sync($storehouses_ids->toArray());

            DB::commit();
            return $this->created($data);
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員' . $e->getMessage());
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
        $this->authorize('products.read');

        try {
            $data = Product::findOrFail($id);
            $data->load('category', 'storehouses', 'creator', 'editor');

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
        $this->authorize('products.update');

        $attributes = $request->validate([
            'product_category_id'   => 'required|exists:product_categories,id',
            'code'                  => 'required|unique:products,code,' . $id,
            'name'                  => 'required|unique:products,name,' . $id,
            'alias'                 => 'nullable|unique:products,alias,' . $id,
            'picture'               => 'nullable',
            'images'                => 'nullable|array',
            'price'                 => 'nullable',
            'invoice_name'          => 'nullable|string',
            'sku'                   => 'required|string',
            'unit'                  => 'required|string',
            'barcode'               => 'nullable',
            'remark'                => 'nullable',
            'status'                => 'required|string',
        ]);

        $storehouses_attributes = $request->validate([
            'storehouses.*.id'              => 'nullable|distinct|exists:storehouses,id|integer',
            'storehouses.*.stock'           => 'nullable|min:0|integer',
            'storehouses.*.safety_stock'    => 'nullable|min:0|integer',
        ]);

        try {
            DB::beginTransaction();
            $data = Product::findOrFail($id);

            $storehouses_ids = collect($storehouses_attributes['storehouses'])->mapWithKeys(fn ($item) => [$item['id'] => collect($item)->except('id')]);
            $data->storehouses()->sync($storehouses_ids->toArray());

            $data->update([
                ...$attributes,
                'price' => $attributes['price'] ?? 0,
            ]);

            DB::commit();
            return $this->success('更新成功');
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return $this->notFound('找無此資料');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            return $this->badRequest('請聯絡管理員' . $e->getMessage());
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
        $this->authorize('products.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = Product::findOrFail($id)->update([
                'status'        => $data['status'],
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
        $this->authorize('products.delete');

        try {
            DB::beginTransaction();
            $data = Product::findOrFail($id)->delete();

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
     * Excel 倒出
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        return Excel::download(new ProductsExport, 'products.xls', \Maatwebsite\Excel\Excel::XLS);
    }

    /**
     * Excel 導入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        Excel::import(new ProductsImport, request()->file('file'));

        return $this->success($data = '匯入成功');
    }

    /**
     * Excel 導入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storehousesImport(Request $request)
    {
        Excel::import(new ProductsStorehousesImport, request()->file('file'));

        return $this->success($data = '匯入成功');
    }
}
