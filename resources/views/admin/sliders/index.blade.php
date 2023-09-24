@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index slider')
@section('content')

    <div>
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>QUẢN LÝ SLIDERS</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Quản lý sliders
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
                        <a class="btn btn-primary" href="{{ route('admin.sliders.create') }}"> Thêm slider mới</a>
                    @endcan

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tiêu đề</th>
                        <th>Miêu tả</th>
                        <th>Image</th>
                        <th>Tình trạng</th>
                        <th width="280px">Tuỳ biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img src="{{ asset('/images/sliders/' . $slider->image) }}"
                                    style=" width: 200px; height: 100px">

                            </td>
                            <td>{{ $slider->status == 1 ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                {{-- @can('category-list') --}}
                                <a class="btn btn-success" href="{{ route('admin.sliders.show', $slider->id) }}">Show</a>
                                {{-- @endcan --}}

                                {{-- @can('category-edit') --}}
                                <a class="btn btn-warning" href="{{ route('admin.sliders.edit', $slider->id) }}">Edit</a>
                                {{-- @endcan --}}
                                {{-- @can('category-delete') --}}
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.sliders.destroy', $slider->id],
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
            {!! $sliders->links() !!}
        </div>
    </div>

@endsection
