@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page role index')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Quản lý bình luận</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Bình luận
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

        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tên người bình luận</th>
                    <th>Sản phẩm</th>
                    <th width="280px">Tuỳ biến</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $key => $comment)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            @foreach ($users as $user)
                                @if ($user->id == $comment->user_id)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($products as $product)
                                @if ($product->id == $comment->product_id)
                                    {{ $product->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @can('users-list')
                            @endcan
                            @can('users-edit')
                            @endcan
                            @can('users-delete')
                            @endcan
                            <a class="btn btn-success" href="{{ route('admin.comments.show', $comment->id) }}">Show</a>
                            {!! Form::open([
                                'onclick' => "return confirm('Are you sure?')",
                                'method' => 'DELETE',
                                'route' => ['admin.comments.destroy', $comment->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $comments->render() !!}
    </div>
@endsection
