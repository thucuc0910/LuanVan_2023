@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create warehouse')
@section('content')
    <div class="pd-20 card-box mb-30 col-lg-12">
        @livewire('ware-house', ['providers' => $providers, 'products' => $products, 'sizes' => $sizes, 'warehouseTemps' => $warehouseTemps])
       
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.addProductBtn', function() {

                var product_id = $(this).val();
                var user_id = "{{ auth()->user()->id }}"
                var size_id = $(this).closest('.prod-tr').find('.productSize').val();
                var qty = $(this).closest('.prod-tr').find('.productQuantity').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/warehouses/product_add/') }}" + "/" + product_id,
                    data: {
                        'product_id': product_id,
                        'user_id': user_id,
                        'size_id': size_id,
                        'qty': qty,
                    },
                    success: function(response) {
                        alert(response.message)
                    },
                });
            });
        });
    </script>

@endsection
