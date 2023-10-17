@extends('user.layouts.app_layout')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @elseif (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- content description -->
    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-12 mb-4 row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8 ">
                        <div class="border rounded-2 px-3 py-2 bg-white ">
                            <div class="pd-20 card-box mb-30">
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-right">
                                            <a class="btn btn-primary" href="{{ url('user/profile') }}"> Back</a>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ url('user/profile/addAddress') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Tên</strong>
                                                <input type="text" name="name"
                                                    class="name form-control">
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Số điện thoại</strong>
                                                <input type="text" name="phone"
                                                    class="phone form-control">
                                            </div>
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tỉnh</label>
                                                <select class="form-control user_city choose" name="user_city" id="city">
                                                    <option value="">------------------------------------Chọn tỉnh thành
                                                        phố--------------------------------------------------------</option>
                                                    @foreach ($cities as $ci)
                                                        <option value="{{ $ci->matp }}">{{ $ci->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Quận/Huyện</label>
                                                <select class="form-control user_district choose" name="user_district" id="district">
                                                    <option value="">------------------------------------Chọn
                                                        Quận/Huyện--------------------------------------------------------</option>
                                                    -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Xã/Phường</label>
                                                <select class="form-control user_ward" name="user_ward" id="ward">
                                                    <option value="">------------------------------------Chọn
                                                        Xã/Phường--------------------------------------------------------</option>
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Địa chỉ cụ thể</strong>
                                                <input type="text" name="user_street" class="user_street form-control">
                                            </div>
                                        </div>
                        
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Đặt làm mặc định</strong><br />
                                                {{-- <input value='1' type="checkbox" name="status" style="width: 30px; height: 30px" class="status"> --}}
                                                <div class="row">
                                                    <input value='1' type="radio" name="status_message" style="width: 20px; height: 20px"> 
                                                    <p class=""> Hoạt động</p>
                        
                                                </div>
                                            </div>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                            <button type="submit" name=""
                                                class="btn btn-primary ">THÊM</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
    </section>
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
