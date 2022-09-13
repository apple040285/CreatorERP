@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .topStatus{
        background-color: var(--mblue1);
    }
</style>
@endsection

@section('tipTitle')
銷售清單
@endsection

@section('content')
<div class="row mypoint">
    <div class="pointList w-100">
        <table class="table table-striped table-hover f16">
            <thead>
                <tr class="cgy1 fw700">
                    <th scope="col" style="width:7.25rem;" class="pl-4">日期</th>
                    <th scope="col">客戶</th>
                    <th scope="col" style="width:4rem;" class="text-right pr-4">金額</th>
                    <th scope="col" style="width:2.75rem;">操作</th>
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
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
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
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
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
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
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
                <p class="my-1">日期 ： <span class="cgy2">2022-09-01</span></p>
                <p class="my-1">單號 ： <span class="cgy2">SA20220808001</span></p>
                <p class="my-1">品項 ： </p>
                <p class="my-1"><span class="cgy2">1.洗澡玩具組</span></p>
                <p class="my-1">數量：<span class="cgy2">20</span> , 價格：<span class="cgy2">100</span> , 總價：<span class="cgy2">2000</span></p>
                <p class="my-1"><span class="cgy2">2.冰雪奇緣</span></p>
                <p class="my-1">數量：<span class="cgy2">20</span> , 價格：<span class="cgy2">100</span> , 總價：<span class="cgy2">2000</span></p>
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
                    <a class="my-4" href="javascript:;">編輯</a>
                    <a class="my-4" href="javascript:;">刪除</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection