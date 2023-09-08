@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create category')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add Color</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.colors.index') }}"> Back</a>
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
            <form action="{{ route('admin.colors.update', $color->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Code</strong>
                            <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                        </div>
                    </div>
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="mb-3 ">
                            <strong>Status</strong><br />
                            <div class="pr-5">
                                <input type="checkbox" name="status" {{ $color->status == '1' ? 'checked=""' : '' }}
                                    style="width:30px; height:30px">
                            </div>
                            Checked=hidden, unchecked=Visible
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

    </div>
@endsection
