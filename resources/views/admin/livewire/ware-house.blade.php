<div id="searchTable">

    <form action="{{ route('admin.warehouses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="">
                    <h4 style="color: blue">Thông tin nhập kho</h4>
                </div>
                <div class="pull-right">
                    {{-- <a class="btn btn-primary" href="/admin/warehouse/index"> Back</a> --}}
                    <button type="submit" class="btn btn-primary ">
                        <i class="micon bi bi-save2"></i>
                        Lưu
                    </button>

                </div>
            </div>
        </div>

        <hr>

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


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Người lập phiếu:</strong>
                    <input type="text" name="name" class="form-control" disabled
                        value="{{ auth()->user()->name }}">

                </div>
                <div class="form-group">
                    <strong>Nhà cung cấp:</strong>
                    <select class="form-control" name="provider">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->provider_name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Ghi chú:</strong>
                    <textarea class="form-control" name="note" style="max-height: 130px"></textarea>
                </div>
            </div>
        </div>

        <div class="pd-5 col-lg-12">
            <table class="table " id="table_id">
                <thead>
                    <tr>
                        {{-- <th class="col-md-1">#</th> --}}
                        <th class="col-md-4">Tên sản phẩm</th>
                        <th class="col-md-3">Size</th>
                        <th class="col-md-2">Số lượng</th>
                        <th class="col-md-2">Tuỳ chỉnh</th>
                    </tr>

                </thead>
                <tbody class="">
                    @if ($products)
                        @foreach ($warehouseTemps as $warehouseTemp)
                            <tr name="table">
                                <td scope="row" class="col-md-4">
                                    {{ $warehouseTemp->product_id }}
                                </td>

                                <td class=" col-md-3">
                                    {{ $warehouseTemp->size_id }}

                                </td>
                                <td class="col-md-2">
                                    {{ $warehouseTemp->quantity }}

                                </td>
                                <td class="col-md-2">
                                    {{ number_format($warehouseTemp->price_import) }} VNĐ

                                </td>
                                <td scope="row" class="col-md-2">
                                    <button type="button"
                                        wire:click="deleteProduct({{ $warehouseTemp->product_id }},{{ $warehouseTemp->size_id }})"
                                        name="" id="bt" class="btn btn-danger m-3">
                                        <i class="micon bi bi-x-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <hr style="font-weight: boild">
        <div class="card-box mb-30">
            <div class="row pt-20 pr-20">
                <div class="row col-md-12 col-sm-12">
                </div>
            </div>

            <div class="pb-20">
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="pt-50">
                        <table class=" table hover  nowrap dataTable no-footer dtr-inline" id="DataTables_Table_2"
                            role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="table-plus datatable-nosort sorting_asc" rowspan="1"
                                        colspan="1"aria-label="Name">
                                        No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending">
                                        Tên
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending">
                                        Size
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Address: activate to sort column ascending">
                                        Số lương
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                        colspan="1" aria-label="Address: activate to sort column ascending">
                                        Giá nhập
                                    </th>
                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Action">Tuỳ biến</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr role="row" class="prod-tr">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td class=" col-md-3">
                                            <select name="product_size" wire:model="productSize"
                                                class="productSize  form-control">
                                                <option>Size</option>
                                                @foreach ($sizes as $size)
                                                    <option class="" name="product_size[{{ $size->id }}]"
                                                        value="{{ $size->id }}">{{ $size->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col-md-2">
                                            <input wire:model="productQuantity"
                                                name="product_quantity[{{ $product->id }}]" type="number"
                                                class="productQuantity form-control form-control-sm  mr-5 ">
                                        </td>
                                        <td class="col-md-2">
                                            <input wire:model="productPriceImport"
                                                name="product_price_import[{{ $product->id }}]" type="number"
                                                class="productPriceImport form-control form-control-sm  mr-5 ">
                                        </td>
                                        <td scope="row" class="col-md-2">
                                            {{-- <button type="button" value="{{ $product->id }}"
                                                class="addProductBtn btn btn-warning btn-sm text-white">
                                                <i class="micon bi bi-plus-lg"></i>

                                            </button> --}}
                                            <button type="button" wire:click="addProduct({{ $product->id }})"
                                                name="" id="bt" class="btn btn-success m-3">
                                                <i class="micon bi bi-plus-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
