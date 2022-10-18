<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--minfo0);
            }

            .select2-container .select2-selection--single,
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 40px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
            }
        </style>
    @endsection

    @section('tipTitle')
        盤點作業
    @endsection

    <div class="topTxt text-center mb-4">
        <div class="f20 fw800">倉庫：{{ auth()->user()['p_member']['storehouse']['name'] ?? '未知' }}</div>
    </div>
    <form class="form-group">
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="product" class="formClass w-100 fw700 cgy2">
                品名：
            </label>
            <div wire:ignore>
                <select wire:model.defer="product_id" class="form-control" id="product" name="product" required @if ($this->isEditCart()) disabled @endif>
                    <option>--請選擇--</option>
                    @foreach ($this->products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                實際盤點數量：
            </label>
            <input wire:model.defer="quantity" type="number" class="form-control" placeholder="實際盤點數量" required>
            @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                國際條碼：
            </label>
            <input type="text" class="form-control" placeholder="國際條碼" readonly>
        </div>


        @if (!$this->isEditCart())
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="next" class="f18 btn btn-lg btn-outline-info d-block mt-3 w-100">
                    下一筆
                </button>
            </div>

            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="finish" class="f18 btn btn-lg btn-info d-block mt-3 w-100">確認</button>
            </div>
        @elseif ($this->isEditCart())
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="update" class="f18 btn btn-lg btn-info d-block mt-3 w-100">
                    更新
                </button>
            </div>
        @endif
    </form>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#product').select2();

                // https://select2.org/programmatic-control/events
                $('#product').on('select2:select', function(e) {
                    var data = e.params.data;
                    @this.set('product_id', data.id);

                    // $('#barcode').focus();
                });
            });
        </script>
    @endsection
</div>
