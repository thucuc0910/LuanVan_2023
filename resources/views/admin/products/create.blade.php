@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create product')
@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb pb-3">
                <div class="pull-left">
                    <a class="btn btn-sm btn-primary m-2" href="{{ route('admin.products.index') }}">Trở về</a>
                </div>
                <div class="pull-right">
                    <h2>THÊM SẢN PHẨM</h2>
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

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tab-header ">
                <ul class="nav nav-tabs customtab" id="myTab" role="tablist">
                    {{-- tab 1 --}}
                    <li class="nav-item p-3 " role="presentation">
                        <a class="nav-link  active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            <strong>
                                Home
                            </strong>
                        </a>
                    </li>
                    {{-- tab 2 --}}
                    {{-- <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="seoteg-tab" data-bs-toggle="tab" data-bs-target="#seoteg-tab-pane"
                            type="button" role="tab" aria-controls="seoteg-tab-pane" aria-selected="false">
                            <strong>
                                SEO Tags
                            </strong>
                        </a>
                    </li> --}}
                    {{-- tab 3 --}}
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="details-tab" data-bs-toggle="tab"
                            data-bs-target="#details-tab-pane"type="button" role="tab" aria-controls="details-tab-pane"
                            aria-selected="false">
                            <strong>
                                Chi tiết
                            </strong>
                        </a>
                    </li>
                    {{-- tab 4 --}}
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="image-tab" data-bs-toggle="tab"
                            data-bs-target="#image-tab-pane"type="button" role="tab" aria-controls="image-tab-pane"
                            aria-selected="false">
                            <strong>
                                Hình ảnh sản phẩm
                            </strong>
                        </a>
                    </li>
                    {{-- tab 5 --}}
                    {{-- <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="color-tab" data-bs-toggle="tab"
                            data-bs-target="#color-tab-pane"type="button" role="tab" aria-controls="color-tab-pane"
                            aria-selected="false">
                            <strong>
                                Size sản phẩm
                            </strong>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                {{-- tab 1 --}}
                <div class="tab-pane fade  p-3 show active" id="home-tab-pane" role="tabpanel"
                    aria-labelledby="home-tab" tabindex="0">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Loại sản phẩm</strong>
                            {{-- {!! Form::select(' categories[]', $categories, [], ['class' => 'form-control', 'multiple']) !!} --}}

                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tên sản phẩm</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Slug</strong>
                            <input type="text" name="slug" class="form-control">
                        </div>
                    </div> --}}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Miêu tả ngắn</strong>
                            <textarea class="form-control" style="height:150px" name="small_description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Miêu tả chi tiết</strong>
                            <textarea class="form-control" style="height:150px" name="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                {{-- tab 2 --}}
                {{-- <div class="tab-pane fade border p-3" id="seoteg-tab-pane" role="tabpanel" aria-labelledby="seoteg-tab"
                    tabindex="0">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tiêu đề meta</strong>
                            <textarea type="text" name="meta_title" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Từ khoá meta</strong>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Miêu tả meta</strong>
                            <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                </div> --}}
                {{-- tab 3 --}}
                <div class="tab-pane fade  p-3" id="details-tab-pane" role="tabpanel"
                    aria-labelledby="details-tab" tabindex="0">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Giá bán</strong>
                                <input type="number" name="original_price" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Giá giảm</strong>
                                <input type="number" name="selling_price" class="form-control">
                            </div>
                        </div>


                        {{-- <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>Quantity</strong><br />
                                <input type="number" name="quantity" class="form-control">
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Trending</strong><br />
                                <div class="row pl-5 pt-2">
                                    <input type="radio" name="trending" style="width: 20px; height: 20px"> 
                                    <p class="pl-1"> Hoạt động</p>
        
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Tình trạng</strong><br />
                                <div class="row pl-5 pt-2">
                                    <input type="radio" name="status" style="width: 20px; height: 20px"> 
                                    <p class="pl-1"> Hoạt động</p>
        
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                {{-- tab 4 --}}
                <div class="tab-pane fade  p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                    tabindex="0">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-mb-12">
                        <strong for="">
                            Hình ảnh sản phẩm
                        </strong>
                        <input type="file" name="image[]" multiple class="form-control">

                    </div>
                </div>
                {{-- tab 5 --}}
                {{-- <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                    tabindex="0">
                    <div class="mb-4 ">
                        <strong for="">
                            Chọn size sản phẩm
                        </strong>
                        <div class="row">
                            @forelse ($colors as $coloritem)
                                <div class="col-md-4 p-2">
                                    <div class="p-3 border mb-3">
                                        Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]" multiple
                                            value="{{ $coloritem->id }}"> {{ $coloritem->name }}
                                        <br />
                                        Quantity: <input type="number" name="colorQuantity[{{ $coloritem->id }}]"
                                            style="width: 200px; border:1px solid" multiple>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <h3>No colors found</h3>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary m-3">Lưu</button>
            </div>
        </form>
    </div>
@endsection
