@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Trang quản lý đơn hàng')
@section('content')
    <div class="page-header">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Quản lý Đơn hàng</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý Đơn hàng
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

    <div class="card-box mb-30">
        <div class="row pd-20">
            <div class="col-md-12 col-sm-12">
                {{-- <div class="form-group">
                    <div class="dt-buttons btn-group flex-wrap" style="">
                        <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                            aria-controls="DataTables_Table_2" type="button"><span>Copy</span></button> <button
                            class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                            aria-controls="DataTables_Table_2" type="button">
                            <span>CSV</span>
                        </button>

                        <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                            aria-controls="DataTables_Table_2" type="button">
                            <span>PDF</span>
                        </button>

                        <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="DataTables_Table_2"
                            type="button">
                            <span>Print</span>
                        </button>

                    </div>
                    <div class="float-right">
                        @can('role-create')
                            <a class="btn btn-primary" href="{{ route('admin.products.create') }}"> Create New Product</a>
                        @endcan
                    </div>
                </div> --}}

                <div class="form-group">
                    <div class="float-right">
                        <form action="" method="get">
                            <div class="dt-buttons btn-group flex-wrap" style="">
                                <div id="DataTables_Table_1_filter" class="pull-right dataTables_filter">
                                    <input name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" type="date"
                                        style="width: 150px" class="form-control form-control-sm" placeholder="Search"
                                        aria-controls="DataTables_Table_2">
                                </div>

                                <div id="DataTables_Table_1_filter" class="pull-right dataTables_filter"
                                    style="margin-left: 10px ">
                                    <select name="status" aria-controls="DataTables_Table_3"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="">Chọn tình trạng</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Chờ duyệt
                                        </option>
                                        <option value="in progress"
                                            {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>Đang giao
                                        </option>
                                        <option value="completed"
                                            {{ Request::get('status') == 'completes' ? 'selected' : '' }}>Đã giao
                                        </option>
                                        <option value="cancelled"
                                            {{ Request::get('status') == 'canceled' ? 'selected' : '' }}>Bị huỷ</option>
                                    </select>
                                </div>

                                <div id="DataTables_Table_1_filter" class="pull-right dataTables_filter"
                                    style="margin-left: 10px ">
                                    <button type="submit" class="btn btn-warning btn-sm" href="">Áp
                                        dụng</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    {{-- <div class="float-right">
                        <div id="DataTables_Table_1_filter" class="pull-right dataTables_filter">
                            <input type="search" style="width: 400px" class="form-control form-control-sm"
                                placeholder="Search" aria-controls="DataTables_Table_2">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="pb-20">
            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="pt-50">

                    <table class=" table hover multiple-select-row data-table-export nowrap dataTable no-footer dtr-inline"
                        id="DataTables_Table_2" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1"
                                    colspan="1"aria-label="Name">
                                    Mã
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending">
                                    Tracking No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Office: activate to sort column ascending">
                                    Tên sản phẩm
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Address: activate to sort column ascending">
                                    Phương thức thanh toán
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Start Date: activate to sort column ascending"
                                    style="">
                                    Ngày đặt hàng
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1" aria-label="Salart: activate to sort column ascending" style="">
                                    Tình trạng
                                </th>
                                <th>
                                    Tuỳ biến
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr role="row" class="odd">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>
                                        {{ $order->fullname }}
                                    </td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->status_message == 1 ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        {{-- @can('category-list') --}}
                                        <a class="btn btn-success"
                                            href="{{ route('admin.orders.show', $order->id) }}">Show</a>
                                        {{-- @endcan --}}

                                        {{-- @can('category-edit') --}}
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>
                                        {{-- @endcan --}}
                                        {{-- @can('category-delete') --}}
                                        {!! Form::open([
                                            'onclick' => "return confirm('Are you sure?')",
                                            'method' => 'DELETE',
                                            'route' => ['admin.orders.destroy', $order->id],
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                        {!! Form::close() !!}
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
