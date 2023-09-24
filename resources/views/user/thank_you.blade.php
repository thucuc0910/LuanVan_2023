@extends('user.layouts.app_layout')
@section('title', 'Thank You for Shopping')
@section('content')
    <div class="py-1 pt-50 mb-500" style="height: 340px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">
                            {{ session('message')}}
                        </h5>
                    @endif
                    <div class="p-4 shadow bg-white">
                        <h2>You Logo</h2>
                        <h4>Cảm ơn quý khách hàng đã lựa chọn sản phẩm của Myshoes!!</h4>
                        <a href="{{ url('user/homAuth')}}" class="btn btn-primary">Cửa hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
