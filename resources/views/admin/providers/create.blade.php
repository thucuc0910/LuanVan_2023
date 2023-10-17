@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create provider')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-3">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.providers.index') }}">Trở lại</a>
                </div>
                <div class="pull-right">
                    <h2 style="color: blue">THÊM NHÀ CUNG CẤP</h2>
                </div>
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mã nhà cung cấp</strong>
                        <input type="text" name="provider_code" class="provider_code form-control">
                    </div>
                </div>
                @error('provider_code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Tên nhà cung cấp</strong>
                        <input type="text" name="provider_name" class="provider_name form-control">
                    </div>
                </div>
                @error('provider_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Số điện thoại</strong>
                        <input type="number" name="provider_phone" class=" provider_phone form-control">
                    </div>
                </div>
                @error('provider_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="email" name="provider_email" class="provider_email form-control">
                    </div>
                </div>
                @error('provider_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tỉnh</label>
                        <select class="form-control provider_city choose" name="provider_city" id="city">
                            <option value="">------------------------------------Chọn tỉnh thành
                                phố--------------------------------------------------------</option>
                            @foreach ($cities as $ci)
                                <option value="{{ $ci->matp }}">{{ $ci->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Quận/Huyện</label>
                        <select class="form-control provider_district choose" name="provider_district" id="district">
                            <option value="">------------------------------------Chọn
                                Quận/Huyện--------------------------------------------------------</option>
                            -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Xã/Phường</label>
                        <select class="form-control provider_ward" name="provider_ward" id="ward">
                            <option value="">------------------------------------Chọn
                                Xã/Phường--------------------------------------------------------</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Địa chỉ cụ thể</label>
                        <input type="text" name="provider_street" class="provider_street form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tuỳ trạng</strong><br />
                        <div class="row pl-5 pt-2">
                            <input type="radio" name="status" class="status" style="width: 20px; height: 20px"> 
                            <p class="pl-1"> Hoạt động</p>
                        </div>
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="button" name="add_provider" class="btn btn-primary add_provider">THÊM</button>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add_provider').click(function() {
                var provider_code = $('.provider_code').val();
                var provider_name = $('.provider_name').val();
                var provider_email = $('.provider_email').val();
                var provider_phone = $('.provider_phone').val();
                var provider_city = $('.provider_city').val();
                var provider_district = $('.provider_district').val();
                var provider_ward = $('.provider_ward').val();
                var provider_street = $('.provider_street').val();
                var status = $('.status').val();


                $.ajax({
                    url: "{{ url('/admin/providers/store') }}",
                    method: 'Post',
                    data: {
                        provider_code      :    provider_code    ,
                        provider_name      :    provider_name    ,
                        provider_email     :    provider_email   ,
                        provider_phone     :    provider_phone   ,
                        provider_city      :    provider_city    ,
                        provider_district  :    provider_district,
                        provider_ward      :    provider_ward    ,
                        provider_street    :    provider_street  ,
                        status             :    status            ,
                    },
                    success: function(data) {
                        alert('Thêm  nhà cung cấp thành công.');
                    }
                });


            });

            $('.choose').on('change', function() {
                var action = $(this).attr('id');
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
                    url: "{{ url('/admin/providers/select_address') }}",
                    data: {
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
