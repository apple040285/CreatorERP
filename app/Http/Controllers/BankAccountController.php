<?php

namespace App\Http\Controllers;

use App\Enum\BankAccountTypeEnum;
use App\Enum\StatusEnum;
use App\Models\BankAccount;
use App\Models\Staff;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('bank_accounts.read');

        $data = tap(
            BankAccount::search($request->input('searchTerm'))->paginate($request->input('perPage')),
            function ($paginatedInstance) use ($request) {
                $sortCollection = $paginatedInstance->sortBy([
                    $request->collect('sort')->map(fn ($m) => [$m['field'], $m['type']])[0]
                ]);
                $sortCollection->load('creator', 'editor', 'bank', 'currency');
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
        $this->authorize('bank_accounts.add');

        $data = $request->validate([
            'bank_id'               => 'required|exists:banks,id',
            'currency_id'           => 'required|exists:currencies,id',
            'type'                  => ['required', new Enum(BankAccountTypeEnum::class)],
            'code'                  => 'required|unique:bank_accounts',
            'name'                  => 'required|unique:bank_accounts',
            'remark'                => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = BankAccount::create($data);

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
        $this->authorize('bank_accounts.read');

        try {
            $data = BankAccount::findOrFail($id);
            $data->load('creator', 'editor', 'bank', 'currency');

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
        $this->authorize('bank_accounts.update');

        $data = $request->validate([
            'bank_id'               => 'required|exists:banks,id',
            'currency_id'           => 'required|exists:currencies,id',
            'type'                  => ['required', new Enum(BankAccountTypeEnum::class)],
            'code'                  => 'required|unique:bank_accounts,code,' . $id,
            'name'                  => 'required|unique:bank_accounts,name,' . $id,
            'remark'                => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            $data = BankAccount::findOrFail($id)->update($data);

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
     * Update the status resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $this->authorize('bank_accounts.update');

        $data = $request->validate([
            'status' => 'required|in:active,disable',
        ]);

        try {
            DB::beginTransaction();
            $data = BankAccount::findOrFail($id)->update([
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
        $this->authorize('bank_accounts.delete');

        try {
            DB::beginTransaction();
            $data = BankAccount::findOrFail($id)->delete();

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
