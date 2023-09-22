@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Trang hiển thị thông tin đơn hàng')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="pd-20 card-box mb-30">


        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-center">
                    <h2 style="color: blue"> Chi tiết Đơn hàng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.orders.index') }}"> Back</a>
                </div>
                <div class="pull-right pr-2">
                    <a target="_blank" class="btn btn-warning btn-sm" href="{{ url('admin/invoice/'.$order->id.'/generate') }}">
                    Xuất hoá đơn
                    </a>
                </div>
                <div class="pull-right  pr-2">
                    <a class="btn btn-primary btn-sm" href="{{ url('admin/invoice/'.$order->id) }}">
                    Xem trước hoá đơn
                    </a>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div>
                    <div class="form-group">
                        <strong>
                            Thông tin đơn hàng
                        </strong>
                    </div>
                </div>
                <hr>
                <div class="">
                    <strong class="col-6 col-md-4">Mã:</strong>
                    <span class="col-6 col-md-8">{{ $order->id }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Tracking No:</strong>
                    <span class="col-6 col-md-8">{{ $order->tracking_no }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Ngày đặt hàng:</strong>
                    <span class="col-6 col-md-8">{{ $order->created_at->format('d/m/Y h:i A') }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Phương thức thanh toán:</strong>
                    <span class="col-6 col-md-8">{{ $order->payment_mode }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Trạng thái:</strong>
                    <span class="col-6 col-md-8">{{ $order->status_message }}</span>
                </div>

            </div>

            <div class="col-md-6">
                <div>
                    <div class="form-group">
                        <strong>
                            Thông tin giao hàng
                        </strong>
                    </div>
                </div>
                <hr>
                <div class="">
                    <strong class="col-6 col-md-4">Tên:</strong>
                    <span class="col-6 col-md-8">{{ $order->fullname }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Email:</strong>
                    <span class="col-6 col-md-8">{{ $order->email }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Số điện thoại:</strong>
                    <span class="col-6 col-md-8">{{ $order->phone }}</span>
                </div>
                <div class="">
                    <strong class="col-6 col-md-4">Địa chỉ:</strong>
                    <span class="col-6 col-md-8">{{ $order->address }}</span>
                </div>
            </div>
        </div>


    </div>

    <div class="pd-20 card-box mb-30">
        <table class=" table hover multiple-select-row data-table-export nowrap dataTable no-footer dtr-inline"
            id="DataTables_Table_2" role="grid">
            <thead>
                <tr role="row">
                    <th>Mã</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Màu</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
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
                    <td colspan="6" class="fw-bold">
                        <strong>Tổng tiền:</strong>
                    </td>
                    <td colspan="1" class="fw-bold">
                        <strong>{{ number_format($totalPrice) }}Vnđ</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="card-body">
            <h4>
                Tình trạng đơn hàng:
            </h4>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ url('admin/orders/' . $order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="">
                            Cập nhật tình trạng đơn hàng
                        </label>
                        <div class="input-group">
                            <select name="order_status" aria-controls="DataTables_Table_3"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="">Chọn tình trạng</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Chờ
                                    duyệt</option>
                                <option value="in progress"
                                    {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>Đang giao</option>
                                <option value="completed" {{ Request::get('status') == 'completes' ? 'selected' : '' }}>Đã
                                    giao</option>
                                <option value="cancelled" {{ Request::get('status') == 'canceled' ? 'selected' : '' }}>Bị
                                    huỷ</option>
                            </select>

                            <div style="padding-left: 10px">

                            </div>
                            <button type="submit" class="btn btn-warning btn-sm" href="">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <br />
                    <h4 class="mt-3">
                        Tình trạng hiện tại của đơn hàng: <span class="text-uppercase">{{ $order->status_message }}</span>
                    </h4>
                </div>
            </div>

            
        </div>
    </div>
@endsection
