@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index coupon')
@section('content')

    <div id="content">
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>QUẢN LÝ MÃ GIẢM GIÁ</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Quản lý mã giảm giá
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                    @can('role-create')
                        <a class="btn btn-primary" href="{{ route('admin.coupons.create') }}">Thêm mã giảm giá</a>
                    @endcan

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Giá trị</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Tình trạng</th>
                        <th width="280px">Tuỳ biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="center">{{ $coupon->coupon_code }}</td>
                            <td class="center">
                                {{ $coupon->amount }}
                                @if ($coupon->coupon_type == "Percentage")
                                    %
                                @else
                                    INR
                                @endif
                            </td>
                            <td class="center">{{ $coupon->start_date }}</td>
                            <td class="center">{{ $coupon->end_date }}</td>
                            <td class="center">
                                @if ($coupon->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                {{-- <a class="btn btn-success" href="{{ route('admin.coupons.show', $coupon->id) }}">Show</a> --}}

                                <a class="btn btn-warning" href="{{ route('admin.coupons.edit', $coupon->id) }}">Edit</a>
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.coupons.destroy', $coupon->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $coupons->links() !!}
        </div>
    </div>
@endsection