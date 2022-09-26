<div>
    @extends('layouts.top')
    @extends('layouts.leftMenu')

    @section('tipTitle')
        銷售查補
    @endsection

    <form wire:submit.prevent="submit" class="form-group">
        <div wire:ignore class="f16 w-75 my-5 d-block mx-auto">
            <select class="form-control" id="customer" name="customer" required>
                <option>--請選擇--</option>
                @foreach ($this->customerManufacturers as $customerManufacturer)
                    <option value="{{ $customerManufacturer->id }}">{{ $customerManufacturer->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="btnRow w-75 d-block mx-auto">
            <button wire:target="submit" type="submit" class="f18 btn btn-lg btn-purple d-block w-100 mt-3">確認</button>
        </div>
    </form>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#customer').select2();
                $('#customer').on('change', function(e) {
                    var data = $('#customer').select2('val');
                    @this.set('customer', data);
                });
            });
        </script>
    @endsection

</div>
