@extends('user.layouts.app_layout')
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <style>
        body {
            background-color:
                #eeeeee;
            font-family: 'Open Sans', serif
        }

        .container_order {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position:
                relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction:
                normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color:
                #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius:
                0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding:
                0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position:
                relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom:
                60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top:
                -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height:
                40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color:
                #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display:
                -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink:
                0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color:
                #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color:
                #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color:
                #ff2b00;
            border-radius: 1px
        }
    </style>
@endsection

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
                    <div class="col-lg-12 ">
                        <div class="pd-20 card-box mb-30">
                            <div class="container_order">
                                <article class="card">
                                    <div class="mt-2">
                                        <a href="#" class="btn btn-warning" data-abc="true"> <i
                                                class="fa fa-chevron-left"></i> Trở lại</a>
                                    </div>
                                    <header class="card-header">Chi tiết đơn hàng</header>
                                    <div class="card-body">
                                        <h6>Mã đơn hàng: {{ $order->id }}</h6>
                                        <article class="card">
                                            <div class="card-body row">
                                                <div class="col-2"> <strong>Ngày đặt hàng: </strong> <br>
                                                    {{ $order->created_at->format('h:i:s d/m/y') }}
                                                </div>
                                                <div class="col-4"> <strong>Vận chuyển bởi:</strong> <br>
                                                    Giao hàng tiết kiệm <i class="fa fa-phone"></i> {{ $order->phone }}
                                                </div>
                                                <div class="col-6 row">
                                                    <strong>Tình trạng đơn hàng:</strong>
                                                    <p style="color: red">
                                                        @if ($order->status_message == 'pending')
                                                            Chờ duyệt
                                                        @elseif ($order->status_message == 'in progress')
                                                            Đã duyệt
                                                        @elseif ($order->status_message == 'transported')
                                                            Đang vận chuyển
                                                        @elseif ($order->status_message == 'completed')
                                                            Đã giao
                                                        @elseif ($order->status_message == 'Cancle')
                                                            Đã huỷ
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="card mt-2">
                                            <div class="card-body row">
                                                <div class="col-12"> <strong>Địa chỉ nhận hàng: </strong>
                                                    <br>
                                                    {{ $order->fullname }}
                                                    <br>
                                                    (+84) {{ $order->phone }}
                                                    <br>
                                                </div>
                                            </div>
                                        </article>
                                        <div class="track">
                                            @php
                                                $status_confirmed = '';
                                                $status_picked = '';
                                                $status_way = '';
                                                $status_ready = '';
                                                if ($order->status_message == 'completed') {
                                                    $status_confirmed = 'active';
                                                    $status_picked = 'active';
                                                    $status_way = 'active';
                                                    $status_ready = 'active';
                                                } elseif ($order->status_message == 'transport') {
                                                    $status_confirmed = 'active';
                                                    $status_picked = 'active';
                                                    $status_way = 'active';
                                                } elseif ($order->status_message == 'in progress') {
                                                    $status_confirmed = 'active';
                                                    $status_picked = 'active';
                                                } else {
                                                    $status_confirmed = 'active';
                                                }
                                            @endphp
                                            <div class="step {{ $status_confirmed }} "> <span class="icon"> <i
                                                        class="fa fa-check"></i>
                                                </span> <span class="text">Đặt hàng thành công</span> </div>
                                            <div class="step {{ $status_picked }}"> <span class="icon"> <i
                                                        class="fa fa-user"></i>
                                                </span> <span class="text">Đơn hàng đang được chuẩn bị</span> </div>
                                            <div class="step {{ $status_way }}"> <span class="icon"> <i
                                                        class="fa fa-truck"></i>
                                                </span> <span class="text"> Đang vận chuyển </span> </div>
                                            <div class="step {{ $status_ready }}"> <span class="icon"> <i
                                                        class="fa fa-box"></i> </span>
                                                <span class="text">Giao hàng thành công</span>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach ($orderItems as $orderItem)
                                            @php
                                                $total = 0;
                                            @endphp
                                            @if ($order->id == $orderItem->order_id)
                                                <ul class="row">
                                                    <li class="col-md-4">
                                                        <figure class="itemside mb-3">
                                                            <div class="aside">
                                                                @if ($orderItem->product->productImages)
                                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                                        class="img-sm border">
                                                                @else
                                                                    <img src="" class="img-sm border">
                                                                @endif
                                                            </div>
                                                            <figcaption class="info align-self-center">
                                                                <p class="title">{{ $orderItem->product->name }} <br>
                                                                    {{ $orderItem->productSize->size->name }}
                                                                    x
                                                                    {{ $orderItem->quantity }}
                                                                </p>
                                                                <span
                                                                    class="text-muted">{{ number_format($orderItem->price) }}
                                                                    VNĐ </span>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                </ul>
                                            @endif
                                            @php
                                                $total += $orderItem->price * $orderItem->quantity;
                                            @endphp
                                        @endforeach
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-10">
                                                Tổng tiền:
                                            </div>

                                            <div class="col-md-2">
                                                <strong>{{ number_format($total) }} VNĐ</strong>
                                            </div>
                                        </div>

                                        @if ($order->status_message = 'pending')
                                            
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <a href="{{ url('user/order/cancle/' . $order->id) }}"
                                                    class="btn btn-sm btn-warning justify-content-end" style="color: white">
                                                    Huỷ đơn
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
