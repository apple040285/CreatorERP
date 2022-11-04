<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--mgray3);
            }

            a,
            .text-mgray3 {
                color: var(--mgray3);
            }

            a:hover,
            a:focus {
                color: var(--mgray4);
            }
        </style>
    @endsection

    @section('tipTitle')
        歷史交易
    @endsection

    <div class="row mypoint">
        <div class="pointList w-100">
            <table class="table table-striped table-hover f16">
                <thead>
                    <tr class="cgy1 fw700">
                        <th scope="col" style="width:8.25rem;" class="pl-4">日期</th>
                        <th scope="col">客戶</th>
                        <th scope="col" style="width:4.25rem;" class="text-right pr-4">金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->salesOrders as $order)
                        <tr>
                            <td class="text-left">
                                <span class="f16 cgy1"> {{ $order->sales_date->format('Y-m-d') }} </span>
                            </td>
                            <td>
                                <button type="button" wire:click="$set('order_id', '{{ $order->id }}')" class="text-mgray3 p-0 d-flex justify-content-start align-items-start btn btn-link w-100" data-toggle="modal" data-target="#detailModal">
                                    <span class="pointTxt text-mblue1">{{ $order->customer_manufacturer->full_name }}</span>
                                </button>
                            </td>
                            <td class="text-right pr-4">{{ round($order->total_amount) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="btnRow w-75 d-block mx-auto">
                <a href="{{ route('historical-transactions-index') }}" class="f18 btn btn-lg btn-gray d-block mt-3">返回</a>
            </div>
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
</div>
