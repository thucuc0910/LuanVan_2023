@extends('user.layouts.app_layout')
@section('title', 'Cart page')
@section('content')
    @livewire('checkout-show', ['categories' => $categories, 'couponDiscount' => $couponDiscount , 'totalPrice' => $totalPrice, 'totalPriceDiscount' => $totalPriceDiscount])
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            

            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                console.log(action);
                var ma_id = $(this).val();
                var $result = '';
                // alert(action);

                // alert(_token);
                if (action == 'city') {
                    result = 'district';
                } else {
                    result = 'ward';
                }

                $.ajax({
                    type: "POST",
                    url: "{{ url('/user/profile/select_address') }}",
                    data: {
                        _token: '{{csrf_token()}}',
                        action: action,
                        ma_id: ma_id,
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
@endsection