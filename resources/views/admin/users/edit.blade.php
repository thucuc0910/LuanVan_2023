@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page edit user')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-3">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.index') }}">Trở lại</a>
                </div>
                <div class="pull-right">
                    <h2>CẬP NHẬT QUẢN TRỊ VIÊN</h2>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mật khẩu:</strong>
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Xác nhận mật khẩu:</strong>
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quyền:</strong>
                    {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
