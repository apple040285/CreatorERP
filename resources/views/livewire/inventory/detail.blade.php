<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--minfo0);
            }

            a,
            .text-minfo0 {
                color: var(--minfo0);
            }

            a:hover,
            a:focus,
            .text-minfo0:hover,
            .text-minfo0:focus {
                color: var(--minfo1);
            }
        </style>
    @endsection

    @section('tipTitle')
        盤點作業
    @endsection

    <div class="row mypoint">
        <div class="topTxt text-center mb-4 d-block mx-auto">
            <div class="f20 fw800">日期：{{ \Carbon\Carbon::now()->format('Y年m月d日') }}</div>
            <div class="f20 fw800">單號：{{ $this->orderNo }}</div>
        </div>
        <div class="pointList w-100">
            <table class="table table-striped table-hover f16">
                <thead>
                    <tr class="cgy1 fw700">
                        <th scope="col" class="text-right" style="width:2rem;">#</th>
                        <th scope="col">名稱</th>
                        <th scope="col" style="width:6.75rem;" class="text-right">實際盤點數量</th>
                        <th scope="col" style="width:3rem;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getCarts() as $index => $cart)
                        <tr>
                            <th scope="row" class="cgy1 fw600 text-right">{{ $index + 1 }}</th>
                            <td>
                                <button type="button" wire:click="$set('cart_id', '{{ $cart->id }}')" class="p-0 btn text-left" data-toggle="modal" data-target="#detailModal">
                                    <span class="pointTxt text-minfo0">{{ $cart->name }}</span>
                                </button>
                            </td>
                            <td class="text-right">{{ $cart->quantity }}</td>
                            <td class="text-center">
                                <button type="button" wire:click="$set('cart_id', '{{ $cart->id }}')" class="p-0 btn3Link d-block mx-auto btn btn-link text-minfo0" data-toggle="modal" data-target="#actionModal">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click="redirectBackForm" class="f18 btn btn-lg btn-outline-info d-block mt-3 w-100">
                    繼續新增
                </button>
            </div>
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click="completePrint" class="f18 btn btn-lg btn-info d-block mt-3 w-100">
                    盤點完成
                </button>
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
                    @if ($baseCart = $this->getCurrentCart())
                        <h3 class="modal-title fw800 f20 cgy2 mb-3 d-flex align-items-center">
                            <span>{{ $baseCart->name }}</span>
                        </h3>
                        <p class="my-1">產品編號 ： {{ $baseCart->associatedModel->code }}</p>
                        <p class="my-1">實際盤點數量 ： {{ $baseCart->quantity }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 操作選單 -->
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-link3">
            <div class="modal-content">
                <div class="modal-body cgy3 f14">
                    <h3 class="modal-title fw800 f18 pb-2 cgy2 text-center border-bottom">操作</h3>
                    @if ($baseCart = $this->getCurrentCart())
                        <div class="show3LinkModal f16">
                            <button type="button" wire:click="redirectEditForm" class="my-4 p-0 btn text-minfo0 w-100">
                                編輯
                            </button>

                            <button type="button" wire:click="removeCartForm" class="my-4 p-0 btn text-minfo0 w-100" data-dismiss="modal" aria-label="Close">
                                刪除
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
