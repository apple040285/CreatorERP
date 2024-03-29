@section("leftMenu")
<style>
    .menu a {
        color: var(--mwhite0);
    }
    .menu a:hover, .menu a:focus {
        color: var(--mwhite1);
    }
    .mypoint h2 {
        margin-top: 0.5rem;
    }
</style>
<div class="mypoint menu">
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--mpurple0);">
        <a href="{{ route('sales-check-index') }}" class="f16 d-flex justify-content-start align-items-center">
            銷售查補
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--mblue1);">
        <a href="{{ route('sales-list-index') }}" class="f16 d-flex justify-content-start align-items-center">
            銷售清單
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--mgreen1);">
        <a href="{{ route('products-return-index') }}" class="f16 d-flex justify-content-start align-items-center">
            商品退貨
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--mred1);">
        <a href="{{ route('return-list-index') }}" class="f16 d-flex justify-content-start align-items-center">
            退貨清單
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--morange0);">
        <a href="{{ route('transfer-job-index') }}" class="f16 d-flex justify-content-start align-items-center">
            調撥作業
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--minfo0);">
        <a href="{{ route('inventory-index') }}" class="f16 d-flex justify-content-start align-items-center">
            盤點作業
        </a>
    </h2>
    <h2 class="f16 fw800 w-100 border-bottom pt-3 pb-3 px-3" style="background-color: var(--mgray3);">
        <a href="{{ route('historical-transactions-index') }}" class="f16 d-flex justify-content-start align-items-center">
            歷史交易
        </a>
    </h2>
</div>
@overwrite