@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index color')
@section('content')

    <div class="page-header">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Colors Management</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Colors Management
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
                    <a class="btn btn-primary" href="{{ route('admin.colors.create') }}"> Create New Color</a>
                @endcan

            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Color Name</th>
                    <th>Color color</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->code }}</td>
                        <td>{{ $color->status == 1 ? 'Hidden' : 'Visible' }}</td>
                        <td>
                            @can('color-list')
                                <a class="btn btn-success" href="{{ route('admin.colors.show', $color->id) }}">Show</a>
                            @endcan
                            @can('color-edit')
                                <a class="btn btn-warning" href="{{ route('admin.colors.edit', $color->id) }}">Edit</a>
                            @endcan
                            @can('color-delete')
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.colors.destroy', $color->id],
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
        {!! $colors->links() !!}
    </div>
@endsection
