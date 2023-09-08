@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index product')
@section('content')

    <div>
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Products Management</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Products Management
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
                    <div class="form-group">
                        <div class="float-right">
                            @can('role-create')
                                <a class="btn btn-primary" href="{{ route('admin.products.create') }}"> Create New Product</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-20">
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="pt-50">

                        <div class="dt-buttons btn-group flex-wrap" style="padding-bottom: 20px ">
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

                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                aria-controls="DataTables_Table_2" type="button">
                                <span>Print</span>
                            </button>
                        </div>

                        <div id="DataTables_Table_2_filter" class="pull-right dataTables_filter">
                            <input type="search" class="form-control form-control-sm" placeholder="Search"
                                aria-controls="DataTables_Table_2">
                        </div>
                        <table
                            class=" table hover multiple-select-row data-table-export nowrap dataTable no-footer dtr-inline"
                            id="DataTables_Table_2" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="table-plus datatable-nosort sorting_asc" rowspan="1"
                                        colspan="1"aria-label="Name">
                                        ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending">
                                        Category
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Address: activate to sort column ascending">
                                        Price
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Start Date: activate to sort column ascending"
                                        style="">
                                        Quantity
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Salart: activate to sort column ascending"
                                        style="">
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr role="row" class="odd">
                                        <td>{{ $i }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                No category
                                            @endif
                                        </td>
                                        <td>{{ $product->original_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            @can('category-list')
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.products.show', $product->id) }}">Show</a>
                                            @endcan

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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-50 padding-block-end">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_2_previous"><a href="#"
                                            aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0"
                                            class="page-link"><i class="ion-chevron-left"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_2" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item next" id="DataTables_Table_2_next"><a
                                            href="#" aria-controls="DataTables_Table_2" data-dt-idx="3"
                                            tabindex="0" class="page-link"><i class="ion-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
