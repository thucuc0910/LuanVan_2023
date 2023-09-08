@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page edit coupon')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 style="color: blue">Update Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.coupons.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Mã giảm giá</strong>
                        <input type="text" name="coupon_code" value="{{ $coupon->coupon_code }}" class="form-control">
                    </div>
                </div>
                @error('coupon_code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Tên mã giảm giá</strong>
                        <input type="text" name="coupon_name" value="{{ $coupon->coupon_name }}" class="form-control">
                    </div>
                </div>
                @error('coupon_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Ngày bắt đầu</strong>
                        <input class="form-control date-picker" value="{{ $coupon->start_date }}" name="start_date" placeholder="Select Date" type="text">
                    </div>
                </div>
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Ngày kết thúc</strong>
                        <input class="form-control date-picker" value="{{ $coupon->end_date }}" name="end_date" placeholder="Select Date" type="text">
                    </div>
                </div>
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Loại giảm giá</strong>
                        <select name="coupon_type" class="custom-select col-12">
                            <option selected="">Vui lòng chọn...</option>
                            <option value="1" {{ $coupon->coupon_type == 1 ? 'selected' : '' }}>Giảm theo tiền</option>
                            <option value="2" {{ $coupon->coupon_type == 2 ? 'selected' : '' }}>Giảm theo phần trăm</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Giá trị giảm giá</strong>
                        <input type="number" name="amount" value="{{ $coupon->amount }}" class="form-control">
                    </div>
                </div>
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
