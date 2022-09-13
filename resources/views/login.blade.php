@extends('layouts.main')

@section('content')
<h4 class="f40 fw700 cp0 text-center">大豐玩具</h4>
<form class="form-group">
    <div class="f16 fw700 cgy3 mb-5 text-center">
        <span>倉庫: BBB-8888</span>
    </div>
    <input class="form-control f16 w-75 p-4 mb-5 bframe mx-auto" type="text" placeholder="帳號">
    <input class="form-control f16 w-75 p-4 mb-5 bframe mx-auto" type="password" placeholder="密碼">
    <div class="btnRow">
        <a href="{{ route('index') }}" class="f18 btn btn-lg btn-purple d-block mt-3 w-75 mx-auto">登入</a>
    </div>
</form>
@endsection