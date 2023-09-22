@extends('user.layouts.app')
@section('title', 'Order Page')

@section('content')

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">$5454</span>
                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Mã</th>
                                    <th>Tracking No</th>
                                    <th>Người nhận</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Ngày</th>
                                    <th>Tình trạng</th>
                                    <th>Tuỳ biến</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->tracking_no }}</td>
                                            <td> {{ $item->fullname }}</td>
                                            <td> {{ $item->pay_mode }}</td>
                                            <td> {{ $item->created_at->format('d/m/Y') }}</td>
                                            <td> {{ $item->status_message }}</td>
                                            <td> <a href="{{ url('user/orders/' . $item->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr colspan="7">
                                            <td>Hiện tại không có đơn hàng nào.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {!! $orders->links() !!}
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection
