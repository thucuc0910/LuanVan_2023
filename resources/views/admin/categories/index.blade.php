@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index category')
@section('content')
    <div>
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Quản lý danh mục</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Danh mục
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
                        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}"> Thêm danh mục</a>
                    @endcan

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tên</th>
                        <th>Tình trạng</th>
                        <th width="280px">Tuỳ biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->status == 1)
                                    <i class="btn micon bi bi-eye-fill"
                                        style="color: white; background-color: rgb(59, 89, 152);"></i>
                                @else
                                    <i class="btn micon bi bi-eye-slash-fill"
                                        style="color: white; background-color: rgb(59, 89, 152);"></i>
                                @endif
                            </td>
                            <td>
                                {{-- @can('category-list')
                                    <a class="btn btn-success"
                                        href="{{ route('admin.categories.show', $category->id) }}">Show</a>
                                @endcan --}}

                                @can('category-edit')
                                    <a class="btn btn-warning" style="color: white"
                                        href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                @endcan
                                @can('category-delete')
                                    {!! Form::open([
                                        'onclick' => "return confirm('Are you sure?')",
                                        'method' => 'DELETE',
                                        'route' => ['admin.categories.destroy', $category->id],
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
            {!! $categories->links() !!}
        </div>
    </div>
@endsection
