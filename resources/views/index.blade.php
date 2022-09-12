@extends('layouts.main')
@extends('layouts.top')

@section('style')
<style>
    .btnBlock{
        height: 150px;
        width: 150px;
        font-size: 25px;
    }
    .leftMenuBtn{
        display: none;
    }
</style>
@endsection

@section('tipTitle')
大豐玩具
@endsection

@section('content')
<div class="d-flex align-items-center row">
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="{{ route('sales-check-index') }}">銷售</br>查補</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">銷售</br>清單</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">商品</br>退貨</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">退貨</br>清單</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">調撥</br>作業</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">盤點</br>作業</a>
    </div>
    <div class="col-6 d-flex justify-content-around">
        <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="/">歷史</br>交易</a>
    </div>
</div>
@endsection