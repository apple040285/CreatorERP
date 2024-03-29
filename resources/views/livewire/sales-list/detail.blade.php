<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            a {
                color: var(--mpurple0);
            }

            a:hover,
            a:focus {
                color: var(--mpurple1);
            }
        </style>
    @endsection

    @section('tipTitle')
        銷售查補
    @endsection

    <div class="row mypoint">
        <div class="topTxt text-center mb-4 d-block mx-auto">
            <div class="f20 fw800">日期：{{ $this->order->sales_date }}</div>
            <div class="f20 fw800">單號：{{ $this->order->sales_order_no }}</div>
            <div class="f20 fw800">客戶名稱：{{ $this->order->customer_manufacturer?->full_name }}</div>
        </div>
        <div class="pointList w-100">
            <table class="table table-striped table-hover f16">
                <thead>
                    <tr class="cgy1 fw700">
                        <th scope="col" class="text-right" style="width:2rem;">#</th>
                        <th scope="col">名稱</th>
                        <th scope="col" style="width:6.25rem;" class="text-right">數量</th>
                        <th scope="col" style="width:3rem;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->order->items as $index => $item)
                        <tr>
                            <th scope="row" class="cgy1 fw600 text-right">{{ $index + 1 }}</th>
                            <td>
                                <button type="button" wire:click="$set('item_id', '{{ $item->id }}')" class="btn btn-link text-left" data-toggle="modal" data-target="#detailModal">
                                    <span class="pointTxt">{{ $item->product->name }}</span>
                                </button>
                            </td>
                            <td class="text-right">{{ $item->quantity }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="$set('item_id', '{{ $item->id }}')" class="btn3Link d-block mx-auto btn btn-link" data-toggle="modal" data-target="#actionModal">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="topTxt text-center my-2 d-block mx-auto">
                <div class="f20 fw800">合計：{{ $item->amount }}</div>
            </div>
            {{-- <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click="redirectSaleForm" class="f18 btn btn-lg btn-outline-purple d-block mt-3 w-100">
                    完成/繼續新增
                </button>
            </div> --}}
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click="completePrint" class="f18 btn btn-lg btn-purple d-block mt-3 w-100">
                    保存/列印
                </button>
            </div>
        </div>
    </div>

    <!-- Modal 詳情 -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw800" id="detailModal">詳細</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body cgy3 f14">
                    @if ($this->orderItem)
                        @php
                            $name = $this->orderItem->product->name;
                            $code = $this->orderItem->product?->code;
                            $barcode = $this->orderItem->product?->barcode;
                            $quantity = $this->orderItem->quantity;
                            $price = $this->orderItem->product?->price ?? 0;
                            $sum = $quantity * $price;
                        @endphp
                        <h3 class="modal-title fw800 f20 cgy2 mb-3 d-flex align-items-center">
                            <span>{{ $name }}</span>
                        </h3>
                        <p class="my-1">產品編號 ： {{ $code }}</p>
                        <p class="my-1">數量 ： {{ $quantity }}</p>
                        <p class="my-1">單價 ： {{ $price }}</p>
                        <p class="my-1">金額 ： {{ $sum }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal 操作選單 -->
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-link3">
            <div class="modal-content">
                <div class="modal-body cgy3 f14">
                    <h3 class="modal-title fw800 f18 pb-2 cgy2 text-center border-bottom">操作</h3>
                    <div class="show3LinkModal f16">
                        <button type="button" wire:click="redirectSaleForm" class="my-4">
                            編輯
                        </button>
                        <a class="my-4" href="javascript:;">刪除</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
