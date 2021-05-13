@extends("admin.layout.layout")

@section("title","Admin Dashboard | Magneto Solution Pvt Ltd")

@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard Magneto
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ionicons ion-person-stalker"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number lg">{{$users->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ionicons ion-social-rss-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Blogs</span>
                            <span class="info-box-number">{{$posts->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ionicons ion-compose"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Comments</span>
                            <span class="info-box-number">{{$comments->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title center-block"><strong>5 Latest Blog.</strong>.<small>.</small></h3>

                    <div class="box-tools pull-right">
                        <button><a href="{{route('admin.create')}}"><span class="glyphicon glyphicon-plus-sign"></span></a></button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>

                    </div>
                </div>
                <!-- /.box-header -->


                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="blog">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{substr($post->description, 0, 40)}}</td>
                                <td>{{$post->cat}}</td>
                                <td>{{$post->created_at}}</td>
                            </tr>
                           @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer -->
            </div>

        </section>  <!-- /.box -->
    </div>

@endsection
@section('dashboard')
    <script>
        let selection = document.querySelector('#user-dropdown');
        let result = document.querySelector('#result');

        selection.addEventListener('change', ()=>{

        });


    $('#blog').DataTable(
    {searching: false, paging: false}
    );
    </script>
@endsection
