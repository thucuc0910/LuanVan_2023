@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page edit category')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cập nhật danh mục</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
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

        {{-- <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên</strong>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                            placeholder="Name">
                    </div>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug</strong>
                        <input type="text" value="{{ $category->slug }}" name="slug" class="form-control">
                    </div>
                </div>
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Miêu tả</strong>
                        <textarea class="form-control" value="{{ $category->description }}" style="height:150px" name="description"
                            rows="3">{{ $category->description }}</textarea>
                    </div>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hình ảnh</strong>
                        <input type="file" name="image" class="form-control">
                        <input type="hidden" name="image" value="{{ $category->image }}" id="image">

                        <div class="p-3">
                            <img src="{{ asset('/images/category/' . $category->image) }}" width="100px" height="100px">
                        </div>
                    </div>
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tình trạng</strong><br />
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked=""' : '' }} style="width: 30px; height: 30px">
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tiêu đề meta</strong>
                        <textarea type="text" value="" name="meta_title" class="form-control">{{ $category->meta_title }}</textarea>
                    </div>
                </div>
                @error('meta_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Từ khoá meta</strong>
                        <textarea type="text" value="" name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                    </div>
                </div>
                @error('meta_keyword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Miêu tả meta</strong>
                        <textarea type="text" value="" name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                    </div>
                </div>
                @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>


        
    </div>
@endsection
