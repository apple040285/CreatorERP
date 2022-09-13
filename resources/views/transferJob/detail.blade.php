@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .topStatus{
        background-color: var(--morange0);
    }
    a {
        color: var(--morange0);
    }
    a:hover, a:focus {
        color: var(--morange1);
    }
</style>
@endsection

@section('tipTitle')
調撥作業
@endsection

@section('content')
<div class="row mypoint">
    <div class="topTxt text-center mb-4 d-block mx-auto">
        <div class="f20 fw800">日期：2022年8月31日</div>
        <div class="f20 fw800">單號：SA20220831001</div>
    </div>
    <div class="pointList w-100">
        <table class="table table-striped table-hover f16">
            <thead>
                <tr class="cgy1 fw700">
                    <th scope="col" class="text-right" style="width:2rem;">#</th>
                    <th scope="col">名稱</th>
                    <th scope="col" style="width:6.25rem;" class="text-right">數量</th>
                    <th scope="col" style="width:3rem;">操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" class="cgy1 fw600 text-right">1</th>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-center" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">正版寶可夢球正版寶可夢球正版寶可夢球正版寶可夢球</span>
                        </a>
                    </td>
                    <td class="text-right">300</td>
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="cgy1 fw600 text-right">2</th>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-center" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">正版寶可夢球</span>
                        </a>
                    </td>
                    <td class="text-right">300</td>
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="cgy1 fw600 text-right">3</th>
                    <td>
                        <a href="javascript:;" class="d-flex justify-content-start align-items-center" data-toggle="modal" data-target="#detailModal">
                            <span class="pointTxt">正版寶可夢球</span>
                        </a>
                    </td>
                    <td class="text-right">300</td>
                    <td class="text-center">
                        <a class="btn3Link d-block mx-auto" href="javascript:;" data-toggle="modal" data-target="#actionModal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="btnRow w-75 d-block mx-auto">
            <a href="javascript:;" class="f18 btn btn-lg btn-outline-orange d-block mt-3">繼續新增</a>
        </div>
        <div class="btnRow w-75 d-block mx-auto">
            <a href="javascript:;" class="f18 btn btn-lg btn-orange d-block mt-3">調撥完成</a>
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
                    <span>正版寶可夢球</span>
                </h3>
                <p class="my-1">產品編號 ： 8347328922828</p>
                <p class="my-1">數量 ： 20</p>
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