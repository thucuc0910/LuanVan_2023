@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page show user')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-3">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.index') }}">Trở lại</a>
                </div>
                <div class="pull-right">
                    <h2>THÔNG TIN NGƯỜI DÙNG</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số điện thoại:</strong>
                    {{ $user->phone }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Địa chỉ:</strong>
                    {{ $user->street }}
                    @foreach ($wards as $ward)
                        @if ($ward->xaid == $user->ward)
                            ,{{ $ward->name }}
                        @endif
                    @endforeach
                    @foreach ($districts as $district)
                        @if ($district->maqh == $user->district)
                            ,{{ $district->name }}
                        @endif
                    @endforeach
                    @foreach ($cities as $ci)
                        @if ($ci->matp == $user->city)
                            ,{{ $ci->name }}
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
