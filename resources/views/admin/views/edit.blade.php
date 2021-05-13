@extends("admin.layout.layout")

@section("content")
    <div class="content-wrapper margin-r-5">
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
        <div class="container">
            <form
                action="/blog/{{$post->slug}}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input
                    type="text"
                    placeholder="Enter Title"
                    value="{{$post->title}}"
                    name="title"
                    class="form-controle">
                <textarea
                    name="description"
                    placeholder="Enter Description"
                    class="form-control">{{$post->description}}</textarea>
                <div class="custom-file w-25">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile"> Select Image</label>
                </div>
                <br>
                <br>
                <button
                    type="submit"
                    class="btn btn-outline-success">Submit
                </button>
            </form>
        </div>

    </div>
@endsection
@section('dashboard')

<script>
        ClassicEditor
            .create( document.querySelector( '.description' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endsection
