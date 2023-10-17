@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page role index')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>QUẢN LÝ QUẢN TRỊ VIÊN</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Quản lý quản trị viên
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
                {{-- <h4 class="text-blue h4">Bordered table</h4>
                <p>
                    Add <code>.table .table-bordered</code> for borders on all
                    sides of the table and cells.
                </p> --}}
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Thêm quản trị viên</a>

                    {{-- <a href="#border-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                        role="button"><i class="fa fa-code"></i>Create New User</a> --}}
                @endcan

            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th width="280px">Tuỳ biến</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @can('users-list')
                            @endcan
                            @can('users-edit')
                            @endcan
                            @can('users-delete')
                            @endcan
                            <a class="btn btn-success" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            {!! Form::open([
                                'onclick' => "return confirm('Are you sure?')",
                                'method' => 'DELETE',
                                'route' => ['admin.users.destroy', $user->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $data->render() !!}
    </div>
@endsection
