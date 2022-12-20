<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--mgreen1);
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
        商品退貨
    @endsection

    <div class="topTxt text-center mb-4">
        <div class="f20 fw800">客戶名稱：{{ $this->customer->full_name }}</div>
    </div>

    <form class="form-group">
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="product" class="formClass w-100 fw700 cgy2">
                品名：
            </label>
            <div wire:ignore>
                <select wire:model="product_id" class="form-control" id="product" name="product" required @if ($this->isEditCart()) disabled @endif>
                    <option>--請選擇--</option>
                    @foreach ($this->products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('product_id')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                數量：
            </label>
            <input wire:model.defer="quantity" type="number" class="form-control" name="amount" placeholder="數量" required>
            @error('quantity')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                單價：
            </label>
            <input type="text" class="form-control" placeholder="單價" readonly value="{{ $this->product?->price }}">
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="amount" class="formClass w-100 fw700 cgy2">
                國際條碼：<small>掃碼槍點擊下方即可觸發</small>
            </label>
            <input wire:ignore.self id="barcode" wire:model="barcode" type="text" class="form-control" placeholder="國際條碼" autofocus onfocus="onFocus()" onblur="onBlur()" value="{{ $this->product?->barcode }}">
        </div>

        @if (!$this->isEditCart())
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="next" class="f18 btn btn-lg btn-outline-success d-block mt-3 w-100">
                    下一筆
                </button>
            </div>

            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="finish" class="f18 btn btn-lg btn-success d-block mt-3 w-100">確認</button>
            </div>
        @elseif ($this->isEditCart())
            <div class="btnRow w-75 d-block mx-auto">
                <button type="button" wire:click.prevent="update" class="f18 btn btn-lg btn-success d-block mt-3 w-100">
                    更新
                </button>
            </div>
        @endif
    </form>

    @error('message')
        <span class="error">{{ $message }}</span>
    @enderror

    @section('script')
        <script>
            const initSelect2 = (element_id) => {
                return $(element_id).select2({
                    ajax: {
                        url: "{{ route('apps.products.index') }}",
                        dataType: 'json',
                        delay: 500,
                        processResults: (data) => ({
                            results: data
                        }),
                        cache: true,
                    },
                    placeholder: '--請選擇--',
                    minimumInputLength: 1,
                    language: {
                        inputTooShort: function (a) {
                            return "請輸入 1 個或多個字元";
                        },
                    },
                    templateResult: (repo) => repo.loading ? '載入中...' : repo.name,
                });
            }

            $(document).ready(function() {
                initSelect2('#product')

                // https://select2.org/programmatic-control/events
                $('#product').on('select2:select', function(e) {
                    var data = e.params.data;
                    @this.set('product_id', data.id);
                });
            });

            window.addEventListener('reset', event => {
                event.detail.forEach(element => {
                    initSelect2(element.target).val(String(element.value));

                    // $(element.target).select2().val(String(element.value))

                    $('#barcode').focus();
                });
            })
        </script>

        <script>
            function onFocus() {
                const target = event.target
                setTimeout(() => {
                    target.readOnly = false
                }, 300);
            }

            function onBlur() {
                event.target.readOnly = true
            }

            window.addEventListener('keydown', function(e) {
                if (e.which == 229 && $('#barcode').attr('readOnly') == null) {
                    $('#barcode').val("");

                    setTimeout(() => {
                        @this.setBarcode($('#barcode').val());

                        $('#barcode').focus();
                    }, 200);
                }
            });
        </script>
    @endsection
</div>
