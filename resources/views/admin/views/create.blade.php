@extends("admin.layout.layout")
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
        <div class="container py-4">
            <form
                action="{{route('admin.create')}}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                {{--<input
                    type="text"
                    placeholder="Enter Title"
                    name="title"
                    class="bg-gray-0 block border-b-2 w-full h-10 text-3xl outline-none">--}}
                <label class="form-label">Title</label>
                <input type="text" name="title"  class="form-control px-2" placeholder="Enter Title">
                <br>
                <label for="category">Category </label>
                <select class="form-control" name="category" id="category">
                    <option selected value="" disabled>Select</option>
                    @foreach($cat as $item)
                        @if($item->status == 1)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endif
                    @endforeach
                </select>
                {{--<textarea
                    name="description"
                    placeholder="   Enter Description"
                    class="py-20 bg-gray-0 block border-b-2 w-full h-30 text-xl outline-none"></textarea>--}}
                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea id="desc" name="description" class="form-control"  rows="3">Enter Description</textarea>
                </div>
                {{--<div class="bg-grey-lighter pt-15">
                    <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg
                    shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                    Select the file
                    </span>
                        <input
                            type="file"
                            name="image"
                            class="hidden">
                    </label>
                </div>--}}
                <br>
                <div class="custom-file w-25">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile"> Select Image</label>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="align-items-center ">
                    <button
                        type="submit"
                        class="btn btn-success">Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('create')
<script>
        ClassicEditor
         .create( document.querySelector( '#desc' ) )
         .catch( error => {
        console.error( error );
         } );
    </script>
@endsection
