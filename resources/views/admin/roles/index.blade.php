@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page role index')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Role Management</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Role Management
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
                    @can('role-create')
                        <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"> Create New Role</a>
                    @endcan
                    {{-- <a href="#border-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                        role="button"><i class="fa fa-code"></i>Create New Role</a> --}}
                @endcan

            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('role-list')
                                <a class="btn btn-success" href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                            @endcan

                            @can('role-edit')
                                <a class="btn btn-warning" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.roles.destroy', $role->id],
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
        {!! $roles->render() !!}
    </div>
@endsection
