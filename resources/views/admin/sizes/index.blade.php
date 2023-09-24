@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index color')
@section('content')

    <div class="page-header">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Quản lý size</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Size
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
                    <a class="btn btn-primary" href="{{ route('admin.sizes.create') }}">Thêm size mới</a>
                @endcan

            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tên size</th>
                    <th>Mã size</th>
                    <th>Tình trạng</th>
                    <th width="280px">Tuỳ biến</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sizes as $size)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $size->name }}</td>
                        <td>{{ $size->code }}</td>
                        <td>
                            @if ($size->status == 1)
                                <i class="btn micon bi bi-eye-fill"
                                    style="color: white; background-color: rgb(59, 89, 152);"></i>
                            @else
                                <i class="btn micon bi bi-eye-slash-fill"
                                    style="color: white; background-color: rgb(59, 89, 152);"></i>
                            @endif
                        </td>
                        <td>
                            {{-- @can('size-list') --}}
                            {{-- <a class="btn btn-success" href="{{ route('admin.sizes.show', $size->id) }}">Show</a> --}}
                            {{-- @endcan --}}
                            {{-- @can('size-edit') --}}
                            <a class="btn btn-warning" href="{{ route('admin.sizes.edit', $size->id) }}">Edit</a>
                            {{-- @endcan --}}
                            {{-- @can('size-delete') --}}
                            {!! Form::open([
                                'onclick' => "return confirm('Are you sure?')",
                                'method' => 'DELETE',
                                'route' => ['admin.sizes.destroy', $size->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            {{-- @endcan --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $sizes->links() !!}
    </div>
@endsection
