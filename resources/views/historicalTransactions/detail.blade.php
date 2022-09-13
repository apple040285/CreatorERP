@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .topStatus{
        background-color: var(--mgray3);
    }
    a {
        color: var(--mgray3);
    }
    a:hover, a:focus {
        color: var(--mgray4);
    }
</style>
@endsection

@section('tipTitle')
歷史交易
@endsection

@section('content')
<div class="row mypoint">
    <div class="pointList w-100">
        <table class="table table-striped table-hover f16">
            <thead>
                <tr class="cgy1 fw700">
                    <th scope="col" style="width:8.25rem;" class="pl-4">日期</th>
                    <th scope="col">客戶</th>
                    <th scope="col" style="width:4.25rem;" class="text-right pr-4">金額</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left">
                        <span class="f16 cgy1">2022-09-01</span>
                    </td>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-start" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">金玉堂（水上）</span>
                        </a>
                    </td>
                    <td class="text-right pr-4">300</td>
                </tr>
                <tr>
                    <td class="text-left">
                        <span class="f16 cgy1">2022-09-01</span>
                    </td>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-start" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">金玉堂（水上）</span>
                        </a>
                    </td>
                    <td class="text-right pr-4">300</td>
                </tr>
                <tr>
                    <td class="text-left">
                        <span class="f16 cgy1">2022-09-01</span>
                    </td>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-start" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">金玉堂（水上）</span>
                        </a>
                    </td>
                    <td class="text-right pr-4">300</td>
                </tr>
            </tbody>
        </table>
        <div class="btnRow w-75 d-block mx-auto">
            <a href="{{ route('historical-transactions-index') }}" class="f18 btn btn-lg btn-gray d-block mt-3">返回</a>
        </div>
    </div>
</div>
<!-- Modal 詳情 -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw800" id="detailModal">詳細</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body cgy3 f14">
                <h3 class="modal-title fw800 f20 cgy2 mb-3 d-flex align-items-center">
                    <span>金玉堂（水上）</span>
                </h3>
                <p class="my-1">日期 ： 2022-09-01</p>
                <p class="my-1">單號 ： SA20220808001</p>
                <p class="my-1">品項 ： </p>
                <p class="my-1">1.洗澡玩具組</p>
                <p class="my-1">數量： 20 價格： 100 總價：2,000</p>
                <p class="my-1">2.冰雪奇緣</p>
                <p class="my-1">數量： 20 價格： 100 總價：2,000</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal 操作選單 -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-link3">
        <div class="modal-content">
            <div class="modal-body cgy3 f14">
                <h3 class="modal-title fw800 f18 pb-2 cgy2 text-center border-bottom">操作</h3>
                <div class="show3LinkModal f16">
                    <a class="my-2" href="javascript:;">編輯</a>
                    <a class="my-2" href="javascript:;">刪除</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection