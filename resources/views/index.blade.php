@extends('layouts.main')
@extends('layouts.top')

@section('style')
<style>
    .btnBlock{
        height: 150px;
        width: 150px;
    }
</style>
@endsection

@section('tipTitle')
大豐玩具
@endsection

@section('content')
<div class="d-flex justify-content-around align-items-center">
    <a class="d-block my-2 btn btn-md btn-primary btnBlock" href="/">銷售查補</a>
    <a class="d-block my-2 btn btn-md btn-danger btnBlock" href="/">銷售清單</a>
</div>
<div class="d-flex justify-content-around align-items-center">
    <a class="d-block my-2 btn btn-md btn-primary btnBlock" href="/">商品退貨</a>
    <a class="d-block my-2 btn btn-md btn-danger btnBlock" href="/">退貨清單</a>
</div>
<div class="d-flex justify-content-around align-items-center">
    <a class="d-block my-2 btn btn-md btn-primary btnBlock" href="/">調撥作業</a>
    <a class="d-block my-2 btn btn-md btn-danger btnBlock" href="/">盤點作業</a>
</div>
<div class="d-flex justify-content-around align-items-center">
    <a class="d-block my-2 btn btn-md btn-primary btnBlock" href="/">歷史交易</a>
</div>
@endsection