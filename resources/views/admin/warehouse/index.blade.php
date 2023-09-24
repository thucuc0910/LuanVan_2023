@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index provider')
@section('content')

    <div id="content">
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Quản lý kho</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Kho
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
                        <a class="btn btn-primary" href="{{ url('admin/warehouses/create') }}"> Lập phiếu nhập kho</a>
                    @endcan

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ngày lập phiếu</th>
                        <th>Ngày duyệt phiếu</th>
                        <th>Người lập phiếu</th>
                        <th>Tình trạng</th>
                        <th width="280px">Tuỳ biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wareHouses as $key => $wareHouse)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="center">
                                {{ $wareHouse->created_at->format('d/m/Y') }}
                            </td>
                            <td class="center">
                                {{ $wareHouse->created_at->format('d/m/Y') }}
                            </td>
                            <td class="center">
                                {{ $wareHouse->admin->name }}
                            </td>
                            <td class="center">
                                @if ($wareHouse->status == 1)
                                    <i class="btn micon bi bi-check2"
                                        style="color: white; background-color: rgb(59, 89, 152);"></i>
                                @else
                                    <i class="btn micon bi bi-question-lg"
                                        style="color: white; background-color: rgb(59, 89, 152);"></i>
                                @endif
                            </td>
                            <td>
                                {{-- <a class="btn btn-success"
                                    href="{{ route('admin.warehouses.show', $warehouse->id) }}">Show</a> --}}

                                <a class="btn btn-warning"
                                    href="{{ route('admin.warehouses.edit', $wareHouse->id) }}">Edit</a>
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.warehouses.destroy', $wareHouse->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $wareHouses->links() !!}
        </div>
    </div>
@endsection
