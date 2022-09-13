@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .topStatus{
        background-color: var(--mgreen1);
    }
</style>
@endsection

@section('tipTitle')
商品退貨
@endsection

@section('content')
<div class="topTxt text-center mb-4">
    <div class="f20 fw800">客戶名稱：金玉堂（水上）</div>
</div>
<form class="form-group">
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="customer" class="formClass w-100 fw700 cgy2">
            品名：
        </label>
        <select class="form-control" id="customer" name="customer" required>
            <option></option>
            <option>aaa</option>
            <option>bbb</option>
            <option>ccc</option>
        </select>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="amount" class="formClass w-100 fw700 cgy2">
            數量：
        </label>
        <input type="number" class="form-control" name="amount" placeholder="數量" value="1" required>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="amount" class="formClass w-100 fw700 cgy2">
            單價：
        </label>
        <input type="text" class="form-control" placeholder="單價" readonly>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="amount" class="formClass w-100 fw700 cgy2">
            國際條碼：
        </label>
        <input type="text" class="form-control" placeholder="國際條碼" readonly>
    </div>
    <div class="btnRow w-75 d-block mx-auto">
        <a href="javascript:;" class="f18 btn btn-lg btn-outline-success d-block mt-3">下一筆</a>
    </div>
    <div class="btnRow w-75 d-block mx-auto">
        <a href="{{ route('products-return-detail') }}" class="f18 btn btn-lg btn-success d-block mt-3">確認</a>
    </div>
</form>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#customer').select2();
});
</script>
@endsection