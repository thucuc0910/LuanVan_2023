@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page create warehouse')
@section('content')
    <div class="pd-20 card-box mb-30 col-lg-12">
        <div id="searchTable">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="">
                        <h4 style="color: blue">Thông tin nhập kho</h4>
                    </div>
                    <div class="pull-right">
                        {{-- <a class="btn btn-primary" href="/admin/warehouse/index"> Back</a> --}}
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

            <form action="{{ route('admin.warehouses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                @php
                                    $row = 0;
                                @endphp
                                @while ($row <= 5)
                                    <tr name="table">
                                        {{-- <td scope="row" class="col-md-1">{{ $row }}</td> --}}
                                        <td scope="row" class="col-md-4">
                                            <select
                                                class="js-example-basic-single custom-select2 form-control select2-hidden-accessible"
                                                name="product_name[{{ $row }}]" style="width: 100%; height: 38px"
                                                data-select2-id="{{ $row }}" tabindex="-1" aria-hidden="true">
                                                <option value="">Sản phẩm</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="productSizeQuantity col-md-3">
                                            <select name="product_size[{{ $row }}]" class="form-control">
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="col-md-2">
                                            <input name="product_quantity[{{ $row }}]" type="number"
                                                class="form-control form-control-sm  mr-5 ">
                                        </td>
                                        <td scope="row" class="col-md-2">
                                            <a class="addProduct btn btn-danger" href="">
                                                <i class="micon bi bi-x-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $row += 1;
                                    @endphp
                                @endwhile ()
                            @endif

                        </tbody>
                    </table>
                </div>

                <div class="row">

                    <div class="text-left">
                        <button type="button" name="{{ $row }}" id="bt" class="btn btn-warning m-3">
                            <i class="micon bi bi-plus-lg"></i>
                            Thêm
                        </button>
                    </div>
                    <div class=" text-left">
                        <button type="submit" class="btn btn-primary m-3">
                            <i class="micon bi bi-save2"></i>
                            Lưu
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });


            $('#bt').click(function() {

                // IF THERE IS NO <tbody> INSIDE THE <table> TAG.
                // $('table').append('<tr><td> Name </td><td> Designation </td><td> Designation </td><td> Designation </td><td> Designation </td></tr>');

                // ADD MORE ROWS.
                // USING AN ARRAY ADD 5 ROWS.
                // $.each(new Array(1), function(i) {
                //     $('table tr:last')
                //         .after('<tr><td><input id="name' + (i + 1) +
                //             '" type="text" class="form-control" /></td>' +
                //             '<td><input id="desig' + (i + 1) +
                //             '" type="text" class="form-control" /></td>' +
                //             '</tr>');
                // });

                // ADD TWO BUTTONS (SUBMIT AND RESET) AT THE END OF THE TABLE.
                // $('table tr:last')
                //     .after('<tr><td><input type="button" id="btSubmit" value="Submit"></td>' +
                //         '<td><input type="button" id="btReset" value="Reset"></td>' +
                //         '</tr>');


                // EXTRACT THE VALUES ENTERED IN THE DYNAMICALLY CREATED 
                // INPUT BOXES.

                var values, divResult;

                $('#btSubmit').click(function() {

                    $(divResult)
                        .empty()
                        .remove();
                    values = '';

                    $('.input').each(function(i) {
                        divResult = $(document.createElement('div'))
                            .css({
                                padding: '5px',
                                width: 'auto'
                            });

                        if (typeof $('#name' + (i + 1)).val() != 'undefined' &&
                            $('#name' + (i + 1)).val() != '') {

                            values += '<b>Name</b>: ' + $('#name' + (i + 1)).val() +
                                ', <b>Designation</b>: ' + $('#desig' + (i + 1)).val() +
                                '<br />'
                        }
                    });

                    // SHOW THE EXTRACTED VALUES ON THE FORM.
                    $(divResult).append('<p><h3>Employee Details</h3></p>' + values);
                    $('body').append(divResult);
                });

                // RESET (CLEAR) ALL THE "TEXT" FIELDS.
                $('#btReset').click(function() {
                    $(':input')
                        .not(':button') // NOT THE BUTTONS.
                        .val('');
                });

            });


            // $('#button_id').on('click', function(e) {
            // $(document).on('click', '#button_id', function(e) {

            //     $.ajax({
            //         url: "{{ url('/admin/warehouses/create') }}",
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(data) {
            //             $('#table_id tbody').append(
            //                 "<tr><td>" + data.column1 + "</td><td>" +
            //                 data.column2 + "</td><td>" + data.column4 + "</td>" + data
            //                 .column3 + "</td>" + data.column3 + "</td>" + data.column3 +
            //                 "</td></tr>");
            //         },
            //         error: function() {
            //             console.log('error');
            //         }
            //     });
            // });



            // $(document).on('click' , '.addProduct', function(e) {

            //     e.preventDefault();
            //     var product_id = "";
            //     console.log(prod_id);
            //     // var prod_id = $(this).val();
            //     // var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            //     var page = $(this).attr('href');
            //     $.ajax({
            //         url: "{{ url('/admin/warehouses/searchProduct') }}",
            //         method: 'GET',
            //         data: {
            //             search_string: search_string
            //         },
            //         success: function(res) {
            //             // $('.table-data').html(res);
            //             $('#searchTable').html(res);
            //             // $('.table-data').load(res);

            //         }
            //     })
            // })

            // $(document).on('keyup', function(e) {
            //     e.preventDefault();
            //     let search_string = $('#search').val();
            //     var page = $(this).attr('href');
            //     $.ajax({
            //         url: "{{ url('/admin/warehouses/searchProduct') }}",
            //         method: 'GET',
            //         data: {
            //             search_string: search_string
            //         },
            //         success: function(res) {
            //             // $('.table-data').html(res);
            //             $('#searchTable').html(res);
            //             // $('.table-data').load(res);

            //         }
            //     })
            // })


        });
    </script>

@endsection
