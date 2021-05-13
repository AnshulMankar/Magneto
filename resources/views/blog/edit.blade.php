@extends('layouts.app')
<script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</script>
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Update Post
            </h1>
        </div>
    </div>

    {{-- @if($error->all())
         <div class="w-4/5">
             <ul>
                 @foreach($error->all() as $error )
                     <li class="w-1/5 mb-4">
                         {{$error}}
                     </li>
                 @endforeach
             </ul>
         </div>
     @endif--}}


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
                id="desc"
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endsection
