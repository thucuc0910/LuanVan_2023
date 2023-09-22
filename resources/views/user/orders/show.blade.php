@extends('user.layouts.app')
@section('title', 'Order Page')

@section('content')

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark">Chi Tiết Đơn Hàng</i>
                            <a href="{{ url('user/orders')}}" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Chi tiết đơn hàng</h5>
                                <hr>
                                <h6>Mã đơn hàng: {{ $order->id }}</h6>
                                <h6>Tracking Id/No: {{ $order->tracking_no }} </h6>
                                <h6>Ngày đặt hàng: {{ $order->created_at->format('d/m/Y h:i A') }} </h6>
                                <h6>Phương thức thanh toán: {{ $order->payment_mode }} </h6>
                                <h6 class="border p-2 text-success">
                                    Tình trạng đơn hàng: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Thông tin giao hàng</h5>
                                <hr>
                                <h6>Họ tên: {{ $order->fullname }} </h6>
                                <h6>Email: {{ $order->email }} </h6>
                                <h6>Số điện thoại: {{ $order->phone }} </h6>
                                <h6>Địa chỉ: {{ $order->address }} </h6>
                                <h6>Pin code: {{ $order->pincode }} </h6>
                            </div>
                        </div>

                        {{-- Chi tiết --}}
                        <br />
                        <h5>Sản phẩm</h5>
                        <hr>
                        <div class="table-responsive ">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Mã</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </thead>
                                <tbody class="shadow bg-white p-3">
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @forelse ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                        style="width: 100px; height: 100px" alt="">
                                                    {{ $orderItem->product->name }}
                                                @else
                                                    <img src="" style="width: 100px; height: 100px" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}


                                            </td>
                                            <td>
                                                @if ($orderItem->productColor)
                                                    <span>
                                                        {{ $orderItem->productColor->Color->name }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td width="10%">{{ number_format($orderItem->price) }}Vnđ</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">
                                                {{ number_format($orderItem->quantity * $orderItem->price) }}Vnđ
                                            </td>
                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr colspan="7">
                                            <td>Hiện tại không có đơn hàng nào.</td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="6" class="fw-bold">Tổng tiền:</td>
                                        <td colspan="1" class="fw-bold">{{ number_format($totalPrice) }}Vnđ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
