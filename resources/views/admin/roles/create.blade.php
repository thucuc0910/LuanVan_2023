@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create role')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary" href="/admin/roles/index">Trở lại</a>
                </div>
                <div class="pull-right">
                    <h2>THÊM QUYỀN</h2>
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


        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên quyền:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quyền:</strong>
                    <br />
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <div class="dropdown bootstrap-select show-tick form-control dropup">
                                <select name="permission[]" class="selectpicker form-control" data-size="5"
                                    data-style="btn-outline-info" multiple="" data-actions-box="true"
                                    data-selected-text-format="count" tabindex="-98">
                                    @foreach ($permission as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    {{-- @foreach ($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                        <br />
                    @endforeach --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>


        </div>
        {!! Form::close() !!}
    </div>
@endsection
