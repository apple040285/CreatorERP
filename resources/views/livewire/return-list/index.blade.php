<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--mred1);
            }

            a,
            .text-mred0 {
                color: var(--mred0);
            }

            a:hover,
            a:focus,
            .text-mred0:hover,
            .text-mred0:focus {
                color: var(--mred0);
                text-decoration: none
            }
        </style>
    @endsection

    @section('tipTitle')
        退貨清單
    @endsection

    <div class="row mypoint">
        <div class="pointList w-100">
            <table class="table table-striped table-hover f16">
                <thead>
                    <tr class="cgy1 fw700">
                        <th scope="col" style="width:7.25rem;" class="pl-4">日期</th>
                        <th scope="col">客戶</th>
                        <th scope="col" style="width:4rem;" class="text-right pr-4">金額</th>
                        <th scope="col" style="width:2.75rem;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->orders as $order)
                        <tr>
                            <td class="text-left">
                                <span class="f16 cgy1"> {{ $order->sales_date->format('Y-m-d') }} </span>
                            </td>
                            <td>
                                <button type="button" wire:click="$set('order_id', '{{ $order->id }}')" class="p-0 btn d-flex justify-content-start align-items-start w-100" data-toggle="modal" data-target="#detailModal">
                                    <span class="pointTxt text-mred0">{{ $order->customer_manufacturer->full_name }}</span>
                                </button>
                            </td>
                            <td class="text-right pr-4">{{ round($order->total_amount) }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="$set('order_id', '{{ $order->id }}')" class="p-0 btn btn3Link text-mred0 d-block mx-auto" data-toggle="modal" data-target="#actionModal">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal 詳情 -->
    <div wire:ignore.self class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw800" id="detailModal">詳細</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body cgy3 f14">
                    @if ($this->order)
                        <h3 class="modal-title fw800 f20 cgy2 mb-3 d-flex align-items-center">
                            <span>{{ $this->order->customer_manufacturer->full_name }}</span>
                        </h3>
                        <p class="my-1">日期 ： <span class="cgy2">{{ $this->order->sales_date->format('Y-m-d') }}</span></p>
                        <p class="my-1">單號 ： <span class="cgy2">{{ $this->order->sales_order_no }}</span></p>
                        <p class="my-1">品項 ： </p>
                        @foreach ($this->order->items as $index => $item)
                            <p class="my-1"><span class="cgy2">{{ $index + 1 }}.{{ $item->product->name }}</span></p>
                            <p class="my-1">數量：
                                <span class="cgy2">{{ $item->quantity }}</span> , 價格：
                                <span class="cgy2">{{ round($item->price) }}</span> , 總價：
                                <span class="cgy2">{{ round($item->amount) }}</span>
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 操作選單 -->
    <div wire:ignore.self class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-link3">
            <div class="modal-content">
                <div class="modal-body cgy3 f14">
                    <h3 class="modal-title fw800 f18 pb-2 cgy2 text-center border-bottom">操作</h3>
                    @if ($order_id)
                        <div class="show3LinkModal f16">
                            <button type="button" wire:click="viewOrder" class="my-4 p-0 btn text-mred0 w-100">
                                檢視
                            </button>

                            <button type="button" wire:click="editOrder" class="my-4 p-0 btn text-mred0 w-100">
                                編輯
                            </button>

                            <button type="button" wire:click="removeOrder" class="my-4 p-0 btn text-mred0 w-100" data-dismiss="modal" aria-label="Close">
                                刪除
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
