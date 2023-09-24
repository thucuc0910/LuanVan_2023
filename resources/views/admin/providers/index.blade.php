@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page index provider')
@section('content')

    <div id="content">
        <div class="page-header">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Quản lý nhà cung cấp</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Quản lý nhà cung cấp
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
                        <a class="btn btn-primary" href="{{ route('admin.providers.create') }}"> Thêm nhà cung cấp</a>
                    @endcan

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã </th>
                        <th>Tên </th>
                        <th>Phone </th>
                        <th>Email</th>
                        {{-- <th>Địa chỉ</th> --}}
                        <th>Tình trạng</th>
                        <th width="280px">Tuỳ biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($providers as $provider)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="center">
                                {{ $provider->provider_code }}
                            </td>
                            <td class="center">
                                {{ $provider->provider_name }}
                            </td>
                            <td class="center">
                                {{ $provider->provider_phone }}
                            </td>
                            <td class="center">
                                {{ $provider->provider_email }}
                            </td>
                            <td class="center">
                                @if ($provider->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                {{-- <a class="btn btn-success"
                                    href="{{ route('admin.providers.show', $provider->id) }}">Show</a> --}}
                                <a class="btn btn-warning"
                                    href="{{ route('admin.providers.edit', $provider->id) }}">Edit</a>
                                {!! Form::open([
                                    'onclick' => "return confirm('Are you sure?')",
                                    'method' => 'DELETE',
                                    'route' => ['admin.providers.destroy', $provider->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $providers->links() !!}
        </div>
    </div>
@endsection
