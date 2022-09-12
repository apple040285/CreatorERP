@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('tipTitle')
商品退貨
@endsection

@section('content')
<form class="form-group">
    <div class="f16 w-75 my-5 d-block mx-auto">
        <select class="custom-select mb-1 mr-sm-2 form-control" id="customer">
            <option>客戶</option>
            <option>aaa</option>
            <option>bbb</option>
        </select>
    </div>
    <div class="btnRow w-75 d-block mx-auto">
        <a href="{{ route('products-return-form') }}" class="f18 btn btn-lg btn-primary d-block mt-3">確認</a>
    </div>
</form>
@endsection