<div>
    @extends('layouts.top')

    @section('style')
        <style>
            .btnBlock {
                height: 150px;
                width: 150px;
                font-size: 25px;
            }

            .leftMenuBtn {
                display: none;
            }
        </style>
    @endsection

    @section('tipTitle')
        大豐玩具
    @endsection

    <div class="d-flex align-items-center row">
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-purple btnBlock" href="{{ route('sales-check-index') }}">銷售</br>查補</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-primary btnBlock" href="{{ route('sales-list-index') }}">銷售</br>清單</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-success btnBlock" href="{{ route('products-return-index') }}">商品</br>退貨</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-danger btnBlock" href="{{ route('return-list-index') }}">退貨</br>清單</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-orange btnBlock" href="{{ route('transfer-job-index') }}">調撥</br>作業</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-info btnBlock" href="{{ route('inventory-index') }}">盤點</br>作業</a>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <a class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-gray btnBlock" href="{{ route('historical-transactions-index') }}">歷史</br>交易</a>
        </div>

        <div class="col-6 d-flex justify-content-around">
            <button type="button" wire:click.prevent="downloadBy('product')" class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-gray btnBlock">
                產品
            </button>
        </div>

        <div class="col-6 d-flex justify-content-around">
            <button type="button" wire:click.prevent="downloadBy('customer')" class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-gray btnBlock">
                客戶
            </button>
        </div>

        <div class="col-6 d-flex justify-content-around">
            <button type="button" wire:click.prevent="downloadBy('sales')" class="d-flex align-items-center justify-content-center my-2 btn btn-md btn-gray btnBlock">
                業務
            </button>
        </div>
    </div>
</div>
