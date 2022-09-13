@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .topStatus{
        background-color: var(--mgray3);
    }
</style>
@endsection

@section('tipTitle')
歷史交易
@endsection

@section('content')
<form class="form-group">
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="catrgory" class="formClass w-100 fw700 cgy2">
            類別：
        </label>
        <select class="mb-1 mr-sm-2 form-control" id="catrgory" name="catrgory" required>
            <option>銷售查補</option>
            <option>商品退貨</option>
        </select>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="customer" class="formClass w-100 fw700 cgy2">
            客戶：
        </label>
        <select class="form-control" id="customer" name="customer" required>
            <option></option>
            <option>aaa</option>
            <option>bbb</option>
            <option>ccc</option>
        </select>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="product" class="formClass w-100 fw700 cgy2">
            品名：
        </label>
        <select class="form-control" id="product" name="product" required>
            <option></option>
            <option>aaa</option>
            <option>bbb</option>
            <option>ccc</option>
        </select>
    </div>
    <div class="f16 w-75 my-3 d-block mx-auto">
        <label for="date" class="formClass w-100 fw700 cgy2">
            日期：
        </label>
        <div class="mb-3 inputDate id1 d-flex align-items-center">
            <span class="inputDatelabel">起始日期：</span>
            <input class="inputDateInput form-control" type="date" id="date1" placeholder="yyyy/mm/dd">
        </div>
        <div class="mb-3 inputDate id2 d-flex align-items-center">
            <span class="inputDatelabel">結束日期：</span>
            <input class="inputDateInput form-control" type="date" id="date2" placeholder="yyyy/mm/dd">
        </div>
    </div>
    <div class="btnRow w-75 d-block mx-auto">
        <a href="{{ route('historical-transactions-detail') }}" class="f18 btn btn-lg btn-gray d-block mt-3">確認</a>
    </div>
</form>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#customer').select2();
    $('#product').select2();
});
</script>
@endsection