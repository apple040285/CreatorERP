@section("leftMenu")
<div class="mypoint">
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('sales-check-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            銷售查補
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('sales-list-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            銷售清單
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('products-return-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            商品退貨
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('return-list-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            退貨清單
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('transfer-job-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            調撥作業
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('inventory-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            盤點作業
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3">
        <a href="{{ route('historical-transactions-index') }}" class="f16 cb1 d-flex justify-content-start align-items-center">
            歷史交易
        </a>
    </h2>
</div>
@overwrite