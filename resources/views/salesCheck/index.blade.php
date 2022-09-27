@extends('layouts.main')
@extends('layouts.top')
@extends('layouts.leftMenu')

@section('style')
<style>
    .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 40px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 40px;
    }
</style>
@endsection

@section('tipTitle')
銷售查補
@endsection

@section('content')
<form class="form-group">
    <div class="f16 w-75 my-5 d-block mx-auto">
        <select class="form-control" id="customer" name="customer" required>
            <option>客戶</option>
            <option>aaa</option>
            <option>bbb</option>
        </select>
    </div>
    <div class="btnRow w-75 d-block mx-auto">
        <a href="{{ route('sales-check-form') }}" class="f18 btn btn-lg btn-purple d-block mt-3">確認</a>
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