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
                    <h2 style="color: blue">CẬP NHẬT NHÀ CUNG CẤP</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mã nhà cung cấp</strong>
                        <input type="text" name="provider_code" value="{{ $provider->provider_code}}" class="provider_code form-control">
                    </div>
                </div>
                @error('provider_code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Tên nhà cung cấp</strong>
                        <input type="text" name="provider_name" value="{{ $provider->provider_name}}" class="provider_name form-control">
                    </div>
                </div>
                @error('provider_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Số điện thoại</strong>
                        <input type="number" name="provider_phone" value="{{ $provider->provider_phone}}" class=" provider_phone form-control">
                    </div>
                </div>
                @error('provider_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="email" name="provider_email" value="{{ $provider->provider_email}}" class="provider_email form-control">
                    </div>
                </div>
                @error('provider_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tỉnh</label>
                        <select class="form-control provider_city choose" name="provider_city" id="city">
                            <option value="">----------------------------------------Chọn tỉnh thành
                                phố--------------------------------------------------------</option>
                            @foreach ($cities as $ci)
                                <option value="{{ $ci->matp }}" {{ $ci->matp == $provider->provider_city ? 'selected' : '' }}>
                                    {{ $ci->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Quận/Huyện</label>
                        <select class="form-control provider_district choose" name="provider_district" id="district">
                            <option value="">----------------------------------------Chọn
                                Quận/Huyện--------------------------------------------------------</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->maqh }}"
                                    {{ $district->maqh == $provider->provider_district ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Xã/Phường</label>
                        <select class="form-control provider_ward" name="provider_ward" id="ward">
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->xaid }}" {{ $ward->xaid == $provider->provider_ward ? 'selected' : '' }}>
                                    {{ $ward->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Địa chỉ cụ thể</strong>
                        <input type="text" name="provider_street" value="{{ $provider->provider_street}}" class="provider_street form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status</strong><br />
                        <input type="checkbox" name="status" {{ $provider->status == '1' ? 'checked=""' : ''}} style="width: 30px; height: 30px" class="status">
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    <button type="submit" name="update_provider" class="btn btn-primary update_provider">THÊM</button>

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
