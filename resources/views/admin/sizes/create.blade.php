@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create category')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-5">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('admin.sizes.index') }}">Trở lại</a>
                </div>
                <div class="pull-right">
                    <h2>Thêm size</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('admin.sizes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tên</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mã</strong>
                            <input type="text" name="code" class="form-control">
                        </div>
                    </div>
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="mb-3 ">
                            <strong>Tình trạng</strong><br />
                            <div class="row pl-5 pt-2">
                                <input type="radio" name="status" style="width: 20px; height: 20px"> 
                                <p class="pl-1"> Hoạt động</p>
    
                            </div>
                            {{-- Checked=hidden, unchecked=Visible --}}
                        </div>
                    </div>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Lứu</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
