@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page edit slider')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Update New Slider</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.sliders.index') }}"> Back</a>
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

        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title</strong>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description</strong>
                        <textarea class="form-control" style="height:150px" name="description" 
                        rows="3">{{ $slider->description }}</textarea>
                    </div>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                        <input type="file" name="image" class="form-control">
                        <input type="hidden" name="image" value="{{ $slider->image }}" id="image">

                        <img src="{{ asset('/images/sliders/' . $slider->image) }}" width="200px" height="100px">
                    </div>
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="form-group">
                        <strong>Status</strong><br />
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked=""' : '' }} style="width: 30px; height: 30px">
                    </div>
                </div>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
