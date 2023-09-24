@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page show user')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Thông tin bình luận</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.comments.index') }}"> Back</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên người bình luận:</strong>
                    @foreach ($users as $user)
                        @if ($user->id == $comment->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sản phẩm:</strong>
                    @foreach ($products as $product)
                        @if ($product->id == $comment->product_id)
                            {{ $product->name }}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nội dung:</strong>
                    {{ $comment->comment_body }}
                </div>
            </div>
        </div>
    </div>
@endsection
