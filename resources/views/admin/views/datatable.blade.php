@extends('admin.layout.layout')
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table of Blog Database</h3>
                    </div>
                    <a class="btn btn-outline-success btn-bitbucket margin-bottom" href="{{route('admin.create')}}"><span>Create<span class="glyphicon plus-round"></span></span></a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Active/Inactive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->image_path}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                   <a href="{{route('admin.edit')}}" class="btn btn-bitbucket"> <span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="#" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
                                </td>

                            </tr>

                            @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
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
@section('datatable')
    <script>
        $('#example1').DataTable(
            {
                pageLength : 5,
            }
        );
    </script>
@endsection
