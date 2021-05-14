@extends("admin.layout.layout")
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
      rel="stylesheet">
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permissions
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Permissions</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12 rounded-circle">
                    <select class="form-select col-lg-2 border-dark grid-width-5 bg-success " id="user" aria-label="Default select example">
                        <option class="align-middle" selected>Select Admin</option>
                        @foreach($users as $user)
                            <option class="bg-white" value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
<br>
                    <div class="panel panel-heading">
                        <div class="panel-heading align-middle text-lg-center text-capitalize bg-success col-lg-12">General Permissions</div>
                        <div class="panel-body">
                        <div id="permit" class="container text-capitalize text-black-50">
                        </div>
                        </div>
                    </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
@section('categoryscript')
    <script >
        $(function () {
            $("#user").change(function () {
                var id = $(this).find(":selected").val();
                $.ajax({
                    url: '{{route('admin.permission.getUserPermission')}}',
                    type: 'GET',
                    data: {id: id}
                }).done(function(data) {
                    $("#permit").html(data);
                }).fail(function() {
                });
            })

            $(document)
                .on('change', '.switch', function () {
                    var permission_id = $(this).data('id');
                    var toggle = $(this).is(':checked');
                    console.log(toggle);
                    var user_id = $('#user').val();
                    $.ajax({
                        type: "POST",
                        url: '{{route('admin.permission.updateUserPermission')}}',
                        data: {'action': toggle ? 'enable': 'disable', 'user_id': user_id, 'permission_id': permission_id, '_token': '{{csrf_token()}}'},
                    }).done(function (data) {
                        alert('Permission updated Successfully');
                    });
                });
        });

    </script>
@endsection
