@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create category')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-5">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.index') }}"> Trở lại</a>

                </div>
                <div class="pull-right">
                    <h2>THÊM LOẠI SẢN PHẨM</h2>

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

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
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

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug</strong>
                        <input type="text" name="slug" class="form-control">
                    </div>
                </div>
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Miêu tả</strong>
                        <textarea class="form-control" style="height:150px" name="description" rows="3"></textarea>
                    </div>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hình ảnh</strong>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tình trạng</strong><br />
                        <div class="row pl-5 pt-2">
                            <input type="radio" name="status" style="width: 20px; height: 20px"> 
                            <p class="pl-1"> Hoạt động</p>

                        </div>
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tiêu đề meta</strong>
                        <textarea type="text" name="meta_title" class="form-control"></textarea>
                    </div>
                </div>
                @error('meta_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Từ khoá meta</strong>
                        <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                @error('meta_keyword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mô tả meta</strong>
                        <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
