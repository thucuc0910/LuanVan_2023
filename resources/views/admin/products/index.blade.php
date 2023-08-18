@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page role index')
@section('content')



    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Products Management</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            {{-- <a href="{{ route('admin.home') }}">Home</a> --}}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products Management
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
                {{-- <h4 class="text-blue h4">Bordered table</h4>
                <p>
                    Add <code>.table .table-bordered</code> for borders on all
                    sides of the table and cells.
                </p> --}}
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-primary" href="/admin/products/create') }}"> Create New Product</a>

                    {{-- <a href="#border-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                        role="button"><i class="fa fa-code"></i>Create New Product</a> --}}
                @endcan

            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="/admin/products/destroy', $product->id) }}" method="POST">
                                <a class="btn btn-success" href="/admin/products/show/{{ $product->id }}">Show</a>
                                @can('product-edit')
                                    <a class="btn btn-warning" href="/admin/products.edit/{{ $product->id }}">Edit</a>
                                @endcan

                                @csrf
                                @method('DELETE')
                                @can('product-delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->links() !!}



        <div class="collapse collapse-box" id="border-table">
            <div class="code-box">
                <div class="clearfix">
                    <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
                        data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                    <a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse"
                        role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                </div>
                <pre><code class="xml copy-pre hljs" id="border-table-code">
<span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table table-bordered"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"col"</span>&gt;</span>#<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">scope</span>=<span class="hljs-string">"row"</span>&gt;</span>1<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span>
            </code></pre>
            </div>
        </div>
    </div>
@endsection
