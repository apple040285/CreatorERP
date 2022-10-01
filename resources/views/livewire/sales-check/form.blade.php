<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('tipTitle')
        銷售查補
    @endsection

    <div class="topTxt text-center mb-4">
        <div class="f20 fw800">客戶名稱：{{ $this->customer?->full_name }}</div>
    </div>

    <form wire:submit.prevent="next" class="form-group">
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="customer" class="formClass w-100 fw700 cgy2">
                品名：
            </label>
            <div wire:ignore>
                <select class="form-control" id="customer" name="customer" required @if (isset($prod_id)) disabled @endif>
                    <option>--請選擇--</option>
                    @foreach ($this->products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('product_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                數量：
            </label>
            <input wire:model.defer="quantity" type="number" class="form-control" placeholder="數量" required>
            @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                單價：
            </label>
            <input type="text" class="form-control" placeholder="單價" readonly value="{{ $this->product?->price }}">
        </div>

        @if (isset($prod_id))
            <div class="f16 w-75 my-3 d-block mx-auto">
                <label for="amount" class="formClass w-100 fw700 cgy2">
                    國際條碼：
                </label>
                <input type="text" class="form-control" placeholder="國際條碼" readonly value="{{ $this->product?->barcode }}">
            </div>

            <div class="btnRow w-75 d-block mx-auto">
                <button wire:click.prevent="update" type="button" class="f18 btn btn-lg btn-outline-purple d-block mt-3 w-100">
                    更新
                </button>
            </div>
        @else
            <div class="f16 w-75 my-3 d-block mx-auto">
                <label for="amount" class="formClass w-100 fw700 cgy2">
                    國際條碼：<small>掃碼槍點擊下方即可觸發</small>
                </label>
                <input id="barcode" type="text" class="form-control" placeholder="國際條碼" autofocus onfocus="onFocus()" onblur="onBlur()" value="{{ $this->product?->barcode }}">
            </div>

            <div class="btnRow w-75 d-block mx-auto">
                <button wire:target="next" type="submit" class="f18 btn btn-lg btn-outline-purple d-block mt-3 w-100">
                    下一筆
                </button>
            </div>

            <div class="btnRow w-75 d-block mx-auto">
                <button wire:click.prevent="finish" type="button" class="f18 btn btn-lg btn-purple d-block mt-3 w-100">確認</button>
            </div>
        @endif
    </form>


    @error('message')
        <span class="error">{{ $message }}</span>
    @enderror

    @section('script')
        <script>
            $(document).ready(function() {
                let prod_id = @js($prod_id)

                $('#customer').select2();

                if (prod_id > 0) {
                    $('#customer').select2('val', String(prod_id));
                }

                $('#customer').on('change', function(e) {
                    var data = $('#customer').select2('val');
                    @this.set('product_id', data);
                });
            });

            window.addEventListener('select2.change', event => {
                $(event.detail.target).select2('val', String(event.detail.value))
            })
        </script>

        <script>
            function onFocus() {
                const target = event.target
                setTimeout(() => {
                    target.readOnly = false
                }, 200);
            }

            function onBlur() {
                event.target.readOnly = true
            }

            window.addEventListener('keydown', function(e) {
                if (e.which == 229) {
                    $('#barcode').val("");
                    setTimeout(() => {
                        const a = $('#barcode').val();
                        console.log(a, 'barcode')

                        @this.setBarcode($('#barcode').val());
                    }, 200);
                }
            }, false);
        </script>
    @endsection
</div>
