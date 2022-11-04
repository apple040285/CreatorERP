<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('style')
        <style>
            .topStatus {
                background-color: var(--mgray3);
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
        歷史交易
    @endsection

    <form class="form-group">
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="catrgory" class="formClass w-100 fw700 cgy2">
                類別：<small class="text-danger">(必填)</small>
            </label>
            <select wire:model.defer="order_type" class="mb-1 mr-sm-2 form-control" id="catrgory" name="catrgory" required>
                <option>--請選擇--</option>
                <option value="sales">銷售查補</option>
                <option value="return">商品退貨</option>
            </select>
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="customer" class="formClass w-100 fw700 cgy2">
                客戶：
            </label>
            <div wire:ignore class="f16 d-block mx-auto">
                <select class="form-control" id="customer" name="customer" required>
                    <option>--請選擇--</option>
                    @foreach ($this->customerManufacturers as $customerManufacturer)
                        <option value="{{ $customerManufacturer->id }}">{{ $customerManufacturer->full_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="product" class="formClass w-100 fw700 cgy2">
                品名：
            </label>
            <div wire:ignore class="f16 d-block mx-auto">
                <select class="form-control" id="product" name="product" required>
                    <option>--請選擇--</option>
                    @foreach ($this->products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="f16 w-75 my-3 d-block mx-auto">
            <label for="date" class="formClass w-100 fw700 cgy2">
                日期：<small class="text-danger">(必填)</small>
            </label>
            <div class="mb-3 inputDate id1 d-flex align-items-center">
                <span class="inputDatelabel">起始日期：</span>
                <input wire:model.defer="starts_at" class="inputDateInput form-control" type="date" id="date1" placeholder="yyyy/mm/dd">
            </div>
            <div class="mb-3 inputDate id2 d-flex align-items-center">
                <span class="inputDatelabel">結束日期：</span>
                <input wire:model.defer="ends_at" class="inputDateInput form-control" type="date" id="date2" placeholder="yyyy/mm/dd">
            </div>
        </div>

        <div class="btnRow w-75 d-block mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="button" wire:click.prevent="finish" class="f18 btn btn-lg btn-gray d-block mt-3 w-100">確認</button>
        </div>
    </form>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#customer').select2();

                // https://select2.org/programmatic-control/events
                $('#customer').on('select2:select', function(e) {
                    var data = e.params.data;
                    @this.set('customer_id', data.id);
                });

                $('#product').select2();

                // https://select2.org/programmatic-control/events
                $('#product').on('select2:select', function(e) {
                    var data = e.params.data;
                    @this.set('product_id', data.id);
                });
            });
        </script>
    @endsection
</div>
