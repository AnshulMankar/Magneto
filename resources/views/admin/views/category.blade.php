@extends("admin.layout.layout")

@section("title","Admin Dashboard | Magneto Solution Pvt Ltd")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table of Category</h3>
                        </div>
                        <div class="container">
                            <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New
                                Product</a>
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade" id="ajaxModel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modelHeading"></h4>
                                    </div>
                                   <div class="container-fluid">
                                    <div class="modal-body">
                                        <form id="productForm" name="productForm" class="form-horizontal">
                                            @csrf
                                            <input type="hidden" name="product_id" id="product_id">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter Name" value="" maxlength="50" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">--Please choose Status on Category--</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>

                                                </div>
                                            </div>


                                            <div class="align-middle position-relative col-sm-pull-12">
                                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </div>



                    </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
@section('categoryscript')
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('category.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'category', name: 'category'},
                    {data: 'status', name: 'status',
                        render: function (data,type,row) {
                            if (data == true) {
                                return '<input id="'+data.DT_RowIndex+'" class="my_switch" type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">';
                            } else {
                                return '<input type="checkbox" id="'+data.DT_RowIndex+'" class="my_switch" type="checkbox"  data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">';
                            }

                        },
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "fnDrawCallback": function() {
                    $('.my_switch').bootstrapToggle();
                },
            });

            $('#createNewProduct').click(function () {
                $('#saveBtn').val("create-product");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Create New Category");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.editProduct', function () {
                var product_id = $(this).data('id');
                $.get("{{ route('category.index') }}" +'/' + product_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#product_id').val(data.id);
                    $('#category').val(data.category);
                    $('#status').val(data.status);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#productForm').serialize(),
                    url: "{{ route('category.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#productForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteProduct', function () {

                var token = $(this).data('token');
                var product_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('category.store') }}"+'/'+product_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": product_id
                    },
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

        });



    </script>
@endsection
