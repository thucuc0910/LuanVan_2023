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
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ auth()->user()->name }}</h5>
                                <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                            </div>
                        </div>

                        <div class="border rounded-2 px-3 py-2 bg-white col-lg-12">
                            <div class="">
                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <div class="col-lg-12">
                                        <li class="nav-item d-flex" role="presentation">
                                            <a class="nav-link  d-flex align-items-center justify-content-center w-100 active"
                                                id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                                aria-controls="ex1-pills-1" aria-selected="true">Thông tin</a>
                                        </li>
                                    </div>
                                    <div class="col-lg-12">
                                        <li class="nav-item d-flex" role="presentation">
                                            <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                                                aria-controls="ex1-pills-2" aria-selected="false">Đơn mua</a>
                                        </li>
                                    </div>

                                    <div class="col-lg-12">
                                        <li class="nav-item d-flex" role="presentation">
                                            <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                                                aria-controls="ex1-pills-3" aria-selected="false">Địa chỉ</a>
                                        </li>
                                    </div>

                                    <div class="col-lg-12">
                                        <li class="nav-item d-flex" role="presentation">
                                            <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab"
                                                aria-controls="ex1-pills-4" aria-selected="false">Mật khẩu</a>
                                        </li>
                                    </div>

                                </ul>
                                <!-- Pills navs -->
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9">
                        <div class="border rounded-2 px-3 py-2 bg-white ">
                            <!-- Pills content -->
                            <div class="tab-content" id="ex1-content">
                                {{-- thông tin --}}
                                <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    <div class=" m-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Tên</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control text-muted mb-2"
                                                        value="{{ auth()->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control text-muted mb-2"
                                                        value="{{ auth()->user()->email }}">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control text-muted mb-2"
                                                        value="{{ auth()->user()->phone }}">

                                                </div>
                                            </div>
                                            <hr>

                                            <div class="row text-left pt-3 col-sm-1">
                                                <button class="btn btn-sm btn-primary">
                                                    Lưu
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- đơn hàng --}}
                                <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel"
                                    aria-labelledby="ex1-tab-2">
                                    <div class="row d-flex justify-content-left">
                                        <div class="col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-body p-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Pills navs -->
                                                        <ul class="nav nav-pills nav-justified mb-1" id="ex1"
                                                            role="tablist">
                                                            <li class="nav-item d-flex" role="presentation">
                                                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                                                    id="ex1-tab-5" data-mdb-toggle="pill"
                                                                    href="#ex1-pills-5" role="tab"
                                                                    aria-controls="ex1-pills-5" aria-selected="true">Tất
                                                                    cả</a>
                                                            </li>
                                                            <li class="nav-item d-flex" role="presentation">
                                                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                                    id="ex1-tab-6" data-mdb-toggle="pill"
                                                                    href="#ex1-pills-6" role="tab"
                                                                    aria-controls="ex1-pills-6" aria-selected="false">Chờ
                                                                    duyệt</a>
                                                            </li>
                                                            <li class="nav-item d-flex" role="presentation">
                                                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                                    id="ex1-tab-7" data-mdb-toggle="pill"
                                                                    href="#ex1-pills-7" role="tab"
                                                                    aria-controls="ex1-pills-7" aria-selected="false">Vận
                                                                    chuyển</a>
                                                            </li>
                                                            <li class="nav-item d-flex" role="presentation">
                                                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                                    id="ex1-tab-9" data-mdb-toggle="pill"
                                                                    href="#ex1-pills-8" role="tab"
                                                                    aria-controls="ex1-pills-9" aria-selected="false">Hoàn
                                                                    thành</a>
                                                            </li>
                                                            <li class="nav-item d-flex" role="presentation">
                                                                <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                                                    id="ex1-tab-10" data-mdb-toggle="pill"
                                                                    href="#ex1-pills-10" role="tab"
                                                                    aria-controls="ex1-pills-10" aria-selected="false">Đã
                                                                    huỷ</a>
                                                            </li>
                                                        </ul>
                                                        <!-- Pills navs -->

                                                        <!-- Pills content -->
                                                        <div class="tab-content" id="ex1-content">
                                                            {{-- Tất cả --}}
                                                            <div class="tab-pane fade show active" id="ex1-pills-5"
                                                                role="tabpanel" aria-labelledby="ex1-tab-5">

                                                                @foreach ($orders as $order)
                                                                    <div class="border rounded-2 px-3 py-2 bg-white mt-3">
                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                <a
                                                                                    href="{{ url('user/profile/orderDetail/' . $order->id) }}">
                                                                                    Mã đơn hàng: {{ $order->id }}
                                                                                </a>
                                                                            </div>
                                                                            <button class="col-md-2 btn btn-success"
                                                                                disabled="disabled">

                                                                                @if ($order->status_message == 'in progress')
                                                                                    Đã duyệt
                                                                                @elseif ($order->status_message == 'pending')
                                                                                    Chờ duyệt
                                                                                @elseif ($order->status_message == 'completed')
                                                                                    Đã giao
                                                                                @elseif ($order->status_message == 'canceled')
                                                                                    Đã huỷ
                                                                                @endif
                                                                            </button>
                                                                        </div>
                                                                        <hr>

                                                                        @foreach ($orderItems as $orderItem)
                                                                            @php
                                                                                $total = 0;
                                                                            @endphp
                                                                            @if ($order->id == $orderItem->order_id)
                                                                                <div class="row">
                                                                                    @if ($orderItem->product->productImages)
                                                                                        <div class="col-md-2">
                                                                                            <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                                                                style="width: 120px; height: 90px"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <div class="col-md-8 ">
                                                                                            {{ $orderItem->product->name }}
                                                                                            <br>
                                                                                            <div class="mt-5">
                                                                                                {{ $orderItem->productSize->size->name }}
                                                                                                x
                                                                                                {{ $orderItem->quantity }}
                                                                                            </div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-2 justify-content-end">
                                                                                            {{ number_format($orderItem->price) }}
                                                                                            VNĐ
                                                                                        </div>
                                                                                    @else
                                                                                        <img src=""
                                                                                            style="width: 100px; height: 100px"
                                                                                            alt="">
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $total += $orderItem->price * $orderItem->quantity;
                                                                            @endphp
                                                                        @endforeach
                                                                        <hr>
                                                                        <div class="col-md-12 row">
                                                                            <div class="col-md-10">Thành tiền:</div>
                                                                            <div class="col-md-2">
                                                                                <strong
                                                                                    style="color: red">{{ number_format($total) }}VNĐ</strong>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            {{-- Chờ duyệt --}}
                                                            <div class="tab-pane fade mb-2" id="ex1-pills-6"
                                                                role="tabpanel" aria-labelledby="ex1-tab-6">
                                                            </div>
                                                            {{-- Vận chuyển --}}
                                                            <div class="tab-pane fade mb-2" id="ex1-pills-7"
                                                                role="tabpanel" aria-labelledby="ex1-tab-7">

                                                            </div>
                                                            {{-- Đang giao --}}
                                                            <div class="tab-pane fade mb-2" id="ex1-pills-8"
                                                                role="tabpanel" aria-labelledby="ex1-tab-8">

                                                            </div>
                                                            {{-- Hoàn thành --}}
                                                            <div class="tab-pane fade mb-2" id="ex1-pills-9"
                                                                role="tabpanel" aria-labelledby="ex1-tab-9">

                                                            </div>
                                                            {{-- Đã huỷ --}}
                                                            <div class="tab-pane fade mb-2" id="ex1-pills-10"
                                                                role="tabpanel" aria-labelledby="ex1-tab-10">

                                                            </div>
                                                        </div>
                                                        <!-- Pills content -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{-- đánh giá --}}
                                <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel"
                                    aria-labelledby="ex1-tab-3">
                                    <div class="row col-md-12">
                                        <div class="col-md-6 ">
                                            <h4 class="mb-3 ">Địa chỉ của tôi</h4>
                                        </div>
                                        {{-- <div class="col-md-6  ">
                                            <button class="align-items-end">
                                                Thêm địa chỉ
                                            </button>
                                        </div> --}}
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <h5>Địa chỉ</h5>
                                    </div>

                                    <div class="row mb-3">
                                        @foreach ($addresses as $address)
                                            @php
                                                $count = 0;
                                            @endphp
                                            @if ($address->user_id == auth()->user()->id)
                                                <div class="mb-3">
                                                    <div class="mb-2">
                                                        <strong>{{ $address->name }}</strong> | (+84)
                                                        {{ $address->phone }}
                                                        <a href="{{ url('user/profile/updateAddress/' . $address->id) }}">
                                                            <i class="fas fa-light fa-pen"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mb-2">
                                                        {{ $address->detail }}
                                                        @foreach ($wards as $ward)
                                                            @if ($ward->xaid == $address->ward)
                                                                , {{ $ward->name }}
                                                            @endif
                                                        @endforeach
                                                        @foreach ($districts as $district)
                                                            @if ($district->maqh == $address->district)
                                                                , {{ $district->name }}
                                                            @endif
                                                        @endforeach
                                                        @foreach ($cities as $city)
                                                            @if ($city->matp == $address->city)
                                                                , {{ $city->name }}
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @if ($address->status == 1)
                                                        <button class="btn btn-danger" disabled="disabled">Mặc
                                                            định</button>
                                                    @endif
                                                    <hr>
                                                </div>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <div class="row text-left pt-3">
                                        <a class="btn btn-primary btn-sm" href="{{ url('user/profile/createAddress/') }}"
                                            style="color: white">
                                            <i class="fa fa-plus"></i> Thêm địa chỉ
                                        </a>
                                    </div>
                                </div>
                                {{-- Mật khẩu --}}
                                <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel"
                                    aria-labelledby="ex1-tab-4">
                                    <form action="{{ url('user/changePassword') }}" method="post">
                                        @csrf
                                        <div class="p-3">
                                            <div class="p-2">
                                                <div class="form-outline">
                                                    <input name="oldpass" type="password" id="formControlLg"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="formControlLg">Mật khẩu hiện
                                                        tại</label>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="form-outline">
                                                    <input name="newpass" type="password" id="formControlLg"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="formControlLg">Mật khẩu mới</label>
                                                </div>
                                            </div>

                                            <div class="p-2">
                                                <div class="form-outline">
                                                    <input name="repass" type="password" id="formControlLg"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="formControlLg">Nhập lại mật khẩu
                                                        mới</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div style="padding-left: 1rem">
                                            <div class="col-12 ">
                                                <button type="submit" class="btn btn-primary ">Thay đổi</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Pills content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
