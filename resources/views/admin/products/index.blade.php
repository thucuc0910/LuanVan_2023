@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index product')
@section('content')

    <div>
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>QUẢN LÝ SẢN PHẨM</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Quản lý sản phẩm
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
            <div class="row pt-20 pr-20">
                <div class="row col-md-12 col-sm-12">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <div class="float-right">
                                @can('role-create')
                                    <a class="btn btn-primary" href="{{ route('admin.products.create') }}"> Thêm sản phẩm</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr>



            <div class="pb-20">
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="pt-50">
                        <table class=" table hover  data-table-export nowrap dataTable no-footer dtr-inline"
                            id="DataTables_Table_2" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending">
                                        No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending">
                                        Tên
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending">
                                        Danh mục
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Address: activate to sort column ascending">
                                        Giá
                                    </th>
                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">
                                        Tình trạng
                                    </th>
                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Action">Tuỳ biến</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr role="row" class="odd">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                No category
                                            @endif
                                        </td>
                                        <td>{{ $product->original_price }}</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <input type="checkbox" checked="" class="switch-btn"
                                                    data-color="#41ccba" data-switchery="true"
                                                    style="display: none; color: rgb(65, 204, 186);">
                                            @else
                                                <span class="switchery switchery-default"
                                                    style="background-color: rgb(255, 255, 255); border-color: rgb(223, 223, 223); box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;"><small
                                                        style="left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
                                            @endif


                                        </td>

                                        <td>
                                            @can('category-edit')
                                                <a class="btn btn-warning"
                                                    href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                                            @endcan
                                            @can('category-delete')
                                                {!! Form::open([
                                                    'onclick' => "return confirm('Are you sure?')",
                                                    'method' => 'DELETE',
                                                    'route' => ['admin.products.destroy', $product->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>

                                        {{-- <td>
                                            <div class="table-actions">
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    data-color="#265ed7" style="color: rgb(38, 94, 215);"><i
                                                        class="icon-copy dw dw-edit2"></i></a>
                                                <a href="{{ route('admin.products.destroy', $product->id) }}"
                                                    data-color="#e95959" style="color: rgb(233, 89, 89);"><i
                                                        class="icon-copy dw dw-delete-3"></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
